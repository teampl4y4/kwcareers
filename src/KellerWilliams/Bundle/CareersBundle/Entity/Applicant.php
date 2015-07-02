<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Applicant
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Applicant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=255)
     */
    private $phoneNumber;

    /**
     * @var array
     *
     * @ORM\Column(name="license", type="simple_array", nullable=true)
     */
    private $license;

    /**
     * @var array
     *
     * @ORM\Column(name="interest", type="simple_array", nullable=true)
     */
    private $interest;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="resume", type="blob", nullable=true)
     */
    private $resume;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="step", type="smallint", nullable=true)
     */
    private $step;

    /**
     * @var boolean
     *
     * @ORM\Column(name="offerSent", type="boolean", nullable=true)
     */
    private $offerSent;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isRejected", type="boolean", nullable=true)
     */
    private $isRejected;

    /**
     * @var string
     *
     * @ORM\Column(name="berkeSourceCandidateId", type="string", length=255, nullable=true)
     */
    private $berkeSourceCandidateId;


    /**
     * @var string
     *
     * @ORM\Column(name="berkeAssessmentUrl", type="string", length=255, nullable=true)
     */
    private $assessmentUrl;

    /**
     * @var MarketCenter
     * @ManyToOne(targetEntity="MarketCenter", cascade={"all"})
     */
    private $marketCenter;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->setStep(0);
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Applicant
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Applicant
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Applicant
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return Applicant
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set license
     *
     * @param array $license
     * @return Applicant
     */
    public function setLicense($license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * Get license
     *
     * @return array 
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * Set interest
     *
     * @param array $interest
     * @return Applicant
     */
    public function setInterest($interest)
    {
        $this->interest = $interest;

        return $this;
    }

    /**
     * Get interest
     *
     * @return array 
     */
    public function getInterest()
    {
        return $this->interest;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return Applicant
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set resume
     *
     * @param string $resume
     * @return Applicant
     */
    public function setResume($resume)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return string 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Applicant
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set step
     *
     * @param integer $step
     * @return Applicant
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return integer 
     */
    public function getStep()
    {
        return $this->step;
    }

    /**
     * Set offerSent
     *
     * @param boolean $offerSent
     * @return Applicant
     */
    public function setOfferSent($offerSent)
    {
        $this->offerSent = $offerSent;

        return $this;
    }

    /**
     * Get offerSent
     *
     * @return boolean 
     */
    public function getOfferSent()
    {
        return $this->offerSent;
    }

    /**
     * Set isRejected
     *
     * @param boolean $isRejected
     * @return Applicant
     */
    public function setIsRejected($isRejected)
    {
        $this->isRejected = $isRejected;

        return $this;
    }

    /**
     * Get isRejected
     *
     * @return boolean 
     */
    public function getIsRejected()
    {
        return $this->isRejected;
    }

    /**
     * @return string
     */
    public function getBerkeSourceCandidateId()
    {
        return $this->berkeSourceCandidateId;
    }

    /**
     * @param string $berkeSourceCandidateId
     */
    public function setBerkeSourceCandidateId($berkeSourceCandidateId)
    {
        $this->berkeSourceCandidateId = $berkeSourceCandidateId;
    }

    /**
     * @return string
     */
    public function getAssessmentUrl()
    {
        return $this->assessmentUrl;
    }

    /**
     * @param string $assessmentUrl
     */
    public function setAssessmentUrl($assessmentUrl)
    {
        $this->assessmentUrl = $assessmentUrl;
    }

    /**
     * @return MarketCenter
     */
    public function getMarketCenter()
    {
        return $this->marketCenter;
    }

    /**
     * @param MarketCenter $marketCenter
     */
    public function setMarketCenter(MarketCenter $marketCenter)
    {
        $this->marketCenter = $marketCenter;
    }
}
