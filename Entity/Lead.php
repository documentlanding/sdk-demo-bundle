<?php

namespace DocumentLanding\SdkDemoBundle\Entity;

use DocumentLanding\SdkBundle\Model\LeadInterface;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="lead_demo")
 */
class Lead implements LeadInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    public function __construct()
    {
        $now = new \DateTime('now');
        $this->CreatedDate = $now;
        $this->LastModifiedDate = $now;
        $this->LeadSource = 'Document Landing';
    }

    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $LastName;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     *
     * @Assert\Email()
     */
    protected $Email;

    /**
     * @ORM\Column(type="string", length=120, nullable=false)
     */
    protected $Company;

    /**
     * @ORM\Column(type="text", length=255, nullable=true)
     */
    protected $Description;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    protected $FirstName;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     * @Assert\Choice(choices = { "Mr.": "Mr.", "Mrs.": "Mrs.", "Miss": "Miss", "Ms.": "Ms.", "Dr.": "Dr.", "Prof.": "Prof.", "Rev.": "Rev.", "Other": "Other"})
     */
    protected $Salutation;

    /**
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    protected $Name;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $Title;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $City;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $State;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    protected $PostalCode;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $Country;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $Phone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $MobilePhone;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $Fax;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    protected $Website;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    protected $Industry;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    protected $AnnualRevenue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $LeadSource;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $IsConverted;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $IsDeleted;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $CreatedDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastModifiedDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MasterRecordId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Status;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $Rating;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $OwnerId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $ConvertedDate;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ConvertedAccountId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ConvertedContactId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ConvertedOpportunityId;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $IsUnreadByOwner;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $CreatedById;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $LastModifiedById;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $SystemModstamp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $LastActivityDate;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $Jigsaw;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $JigsawContactId;          

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $EmailBouncedReason;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $EmailBouncedDate;



    /**
     * Gets id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets the email.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->Email = $email;
    }

    /**
     * Gets the email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Sets the company.
     *
     * @param string $company
     *
     * @return void
     */
    public function setCompany($company)
    {
        $this->Company = $company;
    }

    /**
     * Gets the company.
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->Company;
    }

    /**
     * Set Description
     *
     * @param string $description
     * @return Lead
     */
    public function setDescription($description)
    {
        $this->Description = $description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * Set FirstName
     *
     * @param string $firstName
     * @return Lead
     */
    public function setFirstName($firstName)
    {
        $this->FirstName = $firstName;

        return $this;
    }

    /**
     * Get FirstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * Set LastName
     *
     * @param string $lastName
     * @return Lead
     */
    public function setLastName($lastName)
    {
        $this->LastName = $lastName;

        return $this;
    }

    /**
     * Get LastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * Set Salutation
     *
     * @param string $salutation
     * @return Lead
     */
    public function setSalutation($salutation)
    {
        $this->Salutation = $salutation;

        return $this;
    }

    /**
     * Get Salutation
     *
     * @return string 
     */
    public function getSalutation()
    {
        return $this->Salutation;
    }

    /**
     * Set Name
     *
     * @param string $name
     * @return Lead
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set Title
     *
     * @param string $title
     * @return Lead
     */
    public function setTitle($title)
    {
        $this->Title = $title;

        return $this;
    }

    /**
     * Get Title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * Set City
     *
     * @param string $city
     * @return Lead
     */
    public function setCity($city)
    {
        $this->City = $city;

        return $this;
    }

    /**
     * Get City
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * Set State
     *
     * @param string $state
     * @return Lead
     */
    public function setState($state)
    {
        $this->State = $state;

        return $this;
    }

    /**
     * Get State
     *
     * @return string 
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * Set PostalCode
     *
     * @param string $postalCode
     * @return Lead
     */
    public function setPostalCode($postalCode)
    {
        $this->PostalCode = $postalCode;

        return $this;
    }

    /**
     * Get PostalCode
     *
     * @return string 
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * Set Country
     *
     * @param string $country
     * @return Lead
     */
    public function setCountry($country)
    {
        $this->Country = $country;

        return $this;
    }

    /**
     * Get Country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * Set Phone
     *
     * @param string $phone
     * @return Lead
     */
    public function setPhone($phone)
    {
        $this->Phone = $phone;

        return $this;
    }

    /**
     * Get Phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * Set MobilePhone
     *
     * @param string $mobilePhone
     * @return Lead
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->MobilePhone = $mobilePhone;

        return $this;
    }

    /**
     * Get MobilePhone
     *
     * @return string 
     */
    public function getMobilePhone()
    {
        return $this->MobilePhone;
    }

    /**
     * Set Fax
     *
     * @param string $fax
     * @return Lead
     */
    public function setFax($fax)
    {
        $this->Fax = $fax;

        return $this;
    }

    /**
     * Get Fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * Set Website
     *
     * @param string $website
     * @return Lead
     */
    public function setWebsite($website)
    {
        $this->Website = $website;

        return $this;
    }

    /**
     * Get Website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->Website;
    }

    /**
     * Set Industry
     *
     * @param string $industry
     * @return Lead
     */
    public function setIndustry($industry)
    {
        $this->Industry = $industry;

        return $this;
    }

    /**
     * Get Industry
     *
     * @return string 
     */
    public function getIndustry()
    {
        return $this->Industry;
    }

    /**
     * Set AnnualRevenue
     *
     * @param string $annualRevenue
     * @return Lead
     */
    public function setAnnualRevenue($annualRevenue)
    {
        $this->AnnualRevenue = $annualRevenue;

        return $this;
    }

    /**
     * Get AnnualRevenue
     *
     * @return string 
     */
    public function getAnnualRevenue()
    {
        return $this->AnnualRevenue;
    }

    /**
     * Set LeadSource
     *
     * @param string $leadSource
     * @return Lead
     */
    public function setLeadSource($leadSource)
    {
        $this->LeadSource = $leadSource;

        return $this;
    }

    /**
     * Get LeadSource
     *
     * @return string 
     */
    public function getLeadSource()
    {
        return $this->LeadSource;
    }

    /**
     * Set IsConverted
     *
     * @param boolean $isConverted
     * @return Lead
     */
    public function setIsConverted($isConverted)
    {
        $this->IsConverted = $isConverted;

        return $this;
    }

    /**
     * Get IsConverted
     *
     * @return boolean 
     */
    public function getIsConverted()
    {
        return $this->IsConverted;
    }

    /**
     * Set IsDeleted
     *
     * @param boolean $isDeleted
     * @return Lead
     */
    public function setIsDeleted($isDeleted)
    {
        $this->IsDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get IsDeleted
     *
     * @return boolean 
     */
    public function getIsDeleted()
    {
        return $this->IsDeleted;
    }

    /**
     * Set CreatedDate
     *
     * @param \DateTime $createdDate
     * @return Lead
     */
    public function setCreatedDate($createdDate)
    {
        $this->CreatedDate = $createdDate;

        return $this;
    }

    /**
     * Get CreatedDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->CreatedDate;
    }

    /**
     * Set LastModifiedDate
     *
     * @param \DateTime $lastModifiedDate
     * @return Lead
     */
    public function setLastModifiedDate($lastModifiedDate)
    {
        $this->LastModifiedDate = $lastModifiedDate;

        return $this;
    }

    /**
     * Get LastModifiedDate
     *
     * @return \DateTime 
     */
    public function getLastModifiedDate()
    {
        return $this->LastModifiedDate;
    }

    /**
     * Set MasterRecordId
     *
     * @param integer $masterRecordId
     * @return Lead
     */
    public function setMasterRecordId($masterRecordId)
    {
        $this->MasterRecordId = $masterRecordId;

        return $this;
    }

    /**
     * Get MasterRecordId
     *
     * @return integer 
     */
    public function getMasterRecordId()
    {
        return $this->MasterRecordId;
    }

    /**
     * Set Status
     *
     * @param string $status
     * @return Lead
     */
    public function setStatus($status)
    {
        $this->Status = $status;

        return $this;
    }

    /**
     * Get Status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * Set Rating
     *
     * @param string $rating
     * @return Lead
     */
    public function setRating($rating)
    {
        $this->Rating = $rating;

        return $this;
    }

    /**
     * Get Rating
     *
     * @return string 
     */
    public function getRating()
    {
        return $this->Rating;
    }

    /**
     * Set OwnerId
     *
     * @param integer $ownerId
     * @return Lead
     */
    public function setOwnerId($ownerId)
    {
        $this->OwnerId = $ownerId;

        return $this;
    }

    /**
     * Get OwnerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->OwnerId;
    }

    /**
     * Set ConvertedDate
     *
     * @param \DateTime $convertedDate
     * @return Lead
     */
    public function setConvertedDate($convertedDate)
    {
        $this->ConvertedDate = $convertedDate;

        return $this;
    }

    /**
     * Get ConvertedDate
     *
     * @return \DateTime 
     */
    public function getConvertedDate()
    {
        return $this->ConvertedDate;
    }

    /**
     * Set ConvertedAccountId
     *
     * @param integer $convertedAccountId
     * @return Lead
     */
    public function setConvertedAccountId($convertedAccountId)
    {
        $this->ConvertedAccountId = $convertedAccountId;

        return $this;
    }

    /**
     * Get ConvertedAccountId
     *
     * @return integer 
     */
    public function getConvertedAccountId()
    {
        return $this->ConvertedAccountId;
    }

    /**
     * Set ConvertedContactId
     *
     * @param integer $convertedContactId
     * @return Lead
     */
    public function setConvertedContactId($convertedContactId)
    {
        $this->ConvertedContactId = $convertedContactId;

        return $this;
    }

    /**
     * Get ConvertedContactId
     *
     * @return integer 
     */
    public function getConvertedContactId()
    {
        return $this->ConvertedContactId;
    }

    /**
     * Set ConvertedOpportunityId
     *
     * @param integer $convertedOpportunityId
     * @return Lead
     */
    public function setConvertedOpportunityId($convertedOpportunityId)
    {
        $this->ConvertedOpportunityId = $convertedOpportunityId;

        return $this;
    }

    /**
     * Get ConvertedOpportunityId
     *
     * @return integer 
     */
    public function getConvertedOpportunityId()
    {
        return $this->ConvertedOpportunityId;
    }

    /**
     * Set IsUnreadByOwner
     *
     * @param boolean $isUnreadByOwner
     * @return Lead
     */
    public function setIsUnreadByOwner($isUnreadByOwner)
    {
        $this->IsUnreadByOwner = $isUnreadByOwner;

        return $this;
    }

    /**
     * Get IsUnreadByOwner
     *
     * @return boolean 
     */
    public function getIsUnreadByOwner()
    {
        return $this->IsUnreadByOwner;
    }

    /**
     * Set CreatedById
     *
     * @param integer $createdById
     * @return Lead
     */
    public function setCreatedById($createdById)
    {
        $this->CreatedById = $createdById;

        return $this;
    }

    /**
     * Get CreatedById
     *
     * @return integer 
     */
    public function getCreatedById()
    {
        return $this->CreatedById;
    }

    /**
     * Set LastModifiedById
     *
     * @param integer $lastModifiedById
     * @return Lead
     */
    public function setLastModifiedById($lastModifiedById)
    {
        $this->LastModifiedById = $lastModifiedById;

        return $this;
    }

    /**
     * Get LastModifiedById
     *
     * @return integer 
     */
    public function getLastModifiedById()
    {
        return $this->LastModifiedById;
    }

    /**
     * Set SystemModstamp
     *
     * @param integer $systemModstamp
     * @return Lead
     */
    public function setSystemModstamp($systemModstamp)
    {
        $this->SystemModstamp = $systemModstamp;

        return $this;
    }

    /**
     * Get SystemModstamp
     *
     * @return integer 
     */
    public function getSystemModstamp()
    {
        return $this->SystemModstamp;
    }

    /**
     * Set LastActivityDate
     *
     * @param \DateTime $lastActivityDate
     * @return Lead
     */
    public function setLastActivityDate($lastActivityDate)
    {
        $this->LastActivityDate = $lastActivityDate;

        return $this;
    }

    /**
     * Get LastActivityDate
     *
     * @return \DateTime 
     */
    public function getLastActivityDate()
    {
        return $this->LastActivityDate;
    }

    /**
     * Set Jigsaw
     *
     * @param string $jigsaw
     * @return Lead
     */
    public function setJigsaw($jigsaw)
    {
        $this->Jigsaw = $jigsaw;

        return $this;
    }

    /**
     * Get Jigsaw
     *
     * @return string 
     */
    public function getJigsaw()
    {
        return $this->Jigsaw;
    }

    /**
     * Set JigsawContactId
     *
     * @param integer $jigsawContactId
     * @return Lead
     */
    public function setJigsawContactId($jigsawContactId)
    {
        $this->JigsawContactId = $jigsawContactId;

        return $this;
    }

    /**
     * Get JigsawContactId
     *
     * @return integer 
     */
    public function getJigsawContactId()
    {
        return $this->JigsawContactId;
    }

    /**
     * Set EmailBouncedReason
     *
     * @param string $emailBouncedReason
     * @return Lead
     */
    public function setEmailBouncedReason($emailBouncedReason)
    {
        $this->EmailBouncedReason = $emailBouncedReason;

        return $this;
    }

    /**
     * Get EmailBouncedReason
     *
     * @return string 
     */
    public function getEmailBouncedReason()
    {
        return $this->EmailBouncedReason;
    }

    /**
     * Set EmailBouncedDate
     *
     * @param \DateTime $emailBouncedDate
     * @return Lead
     */
    public function setEmailBouncedDate($emailBouncedDate)
    {
        $this->EmailBouncedDate = $emailBouncedDate;

        return $this;
    }

    /**
     * Get EmailBouncedDate
     *
     * @return \DateTime 
     */
    public function getEmailBouncedDate()
    {
        return $this->EmailBouncedDate;
    }
}
