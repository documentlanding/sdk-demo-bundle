<?php

namespace DocumentLanding\SdkDemoBundle\Service;

use DemoBundle\Entity\Audit;
use Doctrine\ORM\EntityManager;
use DocumentLanding\SdkBundle\DocumentLandingSdkBundleEvents;
use DocumentLanding\SdkBundle\Events\ApiRequestEvent;
use DocumentLanding\SdkBundle\Events\LoadLeadEvent;
use DocumentLanding\SdkBundle\Events\NewLeadEvent;
use DocumentLanding\SdkBundle\Events\UpdatedLeadEvent;
use DocumentLanding\SdkBundle\Events\PreUpdateSchemaEvent;
use DocumentLanding\SdkBundle\Events\PostUpdateSchemaEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SdkDemoManager implements EventSubscriberInterface
{
    
    protected $config;
    protected $mailer;
    protected $em;

    public function __construct($bundleConfig, \Swift_Mailer $mailer, EntityManager $em)
    {
        $this->config = $bundleConfig;
        $this->mailer = $mailer;
        $this->em = $em;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            DocumentLandingSdkBundleEvents::API_REQUEST        => 'onApiRequestEvent',
            DocumentLandingSdkBundleEvents::LOAD_LEAD          => 'onLoadLeadEvent',
            DocumentLandingSdkBundleEvents::NEW_LEAD           => 'onNewLeadEvent',
            DocumentLandingSdkBundleEvents::UPDATED_LEAD       => 'onUpdatedLeadEvent',
            DocumentLandingSdkBundleEvents::PRE_UPDATE_SCHEMA  => 'onPreUpdateSchema',
            DocumentLandingSdkBundleEvents::POST_UPDATE_SCHEMA => 'onPostUpdateSchema',
        );
    }
    
    /*
     * To Do for Document Landing: Nail down IP Range(s) for Document Landing Custom Service Webhooks.
     */
    public function onApiRequestEvent(ApiRequestEvent $event)
    {
        $request = $event->getRequest();
        $client_ip = $request->getClientIp();
        // if (!in_array($client_ip, $allowed_ips) {
        //      $event->setValid(false);
        // }
        $this->log('ApiRequestEvent Received from ' . $client_ip, 'ApiRequestEvent');
    }
    
    /*
     * $request->query will include all query string parameters sent to Document Landing.
     * As such, you may wish to either refine search criteria further, or track something.
     */
    public function onLoadLeadEvent(LoadLeadEvent $event)
    {
        $request = $event->getRequest();
        $data = $request->request->all();
        if (isset($data['Email'])) {
            $email = $data['Email'];
            $event->setSearchCriteria(array('Email'=>$email));
            $this->log($email, 'LoadLeadEvent');
        }
        else {
            $this->log('required data missing', 'LoadLeadEvent');
        }
    }

    public function onNewLeadEvent(NewLeadEvent $event)
    {
        $lead = $event->getLead();
        
        // Here it is assumed you will propagate to another API.
        // Guzzle is recommended.

        // You can also parse the original Data Source for query string parameters
        // "Data Source" is the exact url at Document Landing at the time of submission.
        // Document Landing caters to flexibility with the Query Strings.
        // Example:
        // $sourceUrl = $event->getDataSource();
        // $components = parse_url($this->data['source']);
        // parse_str($components['query'], $queryAsArray);
        // if (isset($queryAsArray['campaignId']) && $queryAsArray['campaignId'] == 'abc') {
        //   $this->doSomething($lead);
        // }

        $this->log($lead->getId(), 'NewLeadEvent', true);
    }

    public function onUpdatedLeadEvent(UpdatedLeadEvent $event)
    {
        $lead = $event->getLead();

        // Here it is assumed you will propagate to another API.
        // Guzzle is recommended.
        
        // You can also parse the original Source for query string parameters
        // See $this->onNewLeadEvent(...) above for information.

        $this->log($lead->getId(), 'UpdatedLeadEvent', true);
    }
    
    public function onPreUpdateSchema(PreUpdateSchemaEvent $event)
    {
        // $event->setError('Some error.'); to Abort Schema Update.
        // Otherwise backup the database prior to the changes as you see fit.
        // Suggest the CloudBackupBundle (https://github.com/dizda/CloudBackupBundle).
    }

    public function onPostUpdateSchema(PostUpdateSchemaEvent $event)
    {
        // You may wish to sync some external lead data.
        // Your methodology here is totally your own.
    }
    
    public function log($message, $event_type, $include_email = false, $subject = null)
    {
        if ($this->config['audit']) {
            $audit = new Audit();
            $audit->setEventType($event_type);
            $audit->setMessage($message);
            $this->em->persist($audit);
            $this->em->flush();
        }

        if ($include_email) {
            if (!$subject) {
                $subject = $event_type;
            }
            if ($this->config['receipt_email']) {
                $message = $this->mailer->createMessage()
                    ->setSubject($subject)
                    ->setFrom($this->config['receipt_email'])
                    ->setTo($this->config['receipt_email'])
                    ->setBody($message)
                ;
                $this->mailer->send($message);
            }
        }
    }
    
}