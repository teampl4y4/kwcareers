<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * MarketCenter
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class MarketCenter
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
     * @var integer
     *
     * @ORM\Column(name="uid", type="integer")
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float")
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float")
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="opFirstName", type="string", length=255, nullable=true)
     */
    private $principleFirstName;

    /**
     * @var string
     *
     * @ORM\Column(name="opLastName", type="string", length=255, nullable=true)
     */
    private $principleLastName;

    /**
     * @var string
     *
     * @ORM\Column(name="opEmail", type="string", length=255, nullable=true)
     */
    private $principleEmail;

    /**
     * @var chargifyId
     *
     * @ORM\Column(name="chargifyId", type="integer", length=255, nullable=true)
     */
    private $chargifyId;

    /**
     * @OneToMany(targetEntity="Applicant", mappedBy="marketCenter", cascade={"persist"}, orphanRemoval=true)
     */
    private $applicants;

    public function __construct()
    {
        $this->applicants = new ArrayCollection();
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
     * Set uid
     *
     * @param integer $uid
     * @return MarketCenter
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return integer 
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return MarketCenter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lat
     *
     * @param float $lat
     * @return MarketCenter
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return float 
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set lng
     *
     * @param float $lng
     * @return MarketCenter
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return float 
     */
    public function getLng()
    {
        return $this->lng;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return MarketCenter
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getPrincipleFirstName()
    {
        return $this->principleFirstName;
    }

    /**
     * @param mixed $principleFirstName
     */
    public function setPrincipleFirstName($principleFirstName)
    {
        $this->principleFirstName = $principleFirstName;
    }

    /**
     * @return string
     */
    public function getPrincipleLastName()
    {
        return $this->principleLastName;
    }

    /**
     * @param string $principleLastName
     */
    public function setPrincipleLastName($principleLastName)
    {
        $this->principleLastName = $principleLastName;
    }

    /**
     * @return string
     */
    public function getPrincipleEmail()
    {
        return $this->principleEmail;
    }

    /**
     * @param string $principleEmail
     */
    public function setPrincipleEmail($principleEmail)
    {
        $this->principleEmail = $principleEmail;
    }

    /**
     * @return chargifyId
     */
    public function getChargifyId()
    {
        return $this->chargifyId;
    }

    /**
     * @param chargifyId $chargifyId
     */
    public function setChargifyId($chargifyId)
    {
        $this->chargifyId = $chargifyId;
    }

    /**
     * Set applicants for a MarketCenter
     * @param ArrayCollection $applicants
     */
    public function setApplicants(ArrayCollection $applicants)
    {
        $this->applicants = $applicants;
    }

    /**
     * Get applicants for a MarketCenter
     * @return ArrayCollection
     */
    public function getApplicants()
    {
        return $this->applicants;
    }

    public function __toString()
    {
        return $this->name;
    }
}
