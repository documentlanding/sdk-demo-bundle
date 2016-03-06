<?php

namespace DocumentLanding\SdkDemoBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
	    $text = file_get_contents(__DIR__ . '/../../sdk-bundle/README.md'); 
	    $html = $this->container->get('markdown.parser')->transformMarkdown($text);
        return new Response('<html><head><title>Welcome to Document Landing SDK</title></head><body>' . $html . '</body></html>');
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction()
    {
	    $config = $this->container->getParameter('DocumentLandingSdk');
	    $sdkManager = $this->container->get('documentlanding.sdk_manager');
	    $leadClass = $sdkManager->getLeadClass();
        $lead = new $leadClass();
        $props = $this->getLeadProperties($lead);

	    $html = '
	    <p><input name="api_key" placeholder="api_key" value="' . $config['api_key'] . '" /></p>
	    <p><input name="Id" placeholder="Id" /></p>';

	    foreach($props as $prop) {
		    $name = $prop->getName();
		    $html .= '<p><input name="' . $name . '" placeholder="' . $name . '" /></p>';
	    }

	    $html ='
	    <form action="/api/lead/create-or-update" method="POST">
	      ' . $html . '
	      <input type="submit" value="Submit" />
	    </form>';

	    return new Response('<html><body>' . $html . '</body></html>');
    }
    
    
    private function getLeadProperties($lead)
    {
	    $reflect = new \ReflectionClass($lead);
	    $props = $reflect->getProperties(\ReflectionProperty::IS_PUBLIC | \ReflectionProperty::IS_PROTECTED);
	    return $props;
    }
    
}