<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Component\Config\Definition\Exception\Exception;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * MarketCenter
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MarketCenterRepository")
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
     * @var string
     *
     * @ORM\Column(name="uid", type="string", length=255, unique=true)
     */
    private $uid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer")
     */
    private $zip;

    /**
     * @var float
     *
     * @ORM\Column(name="lat", type="float", nullable=true)
     */
    private $lat;

    /**
     * @var float
     *
     * @ORM\Column(name="lng", type="float", nullable=true)
     */
    private $lng;

    /**
     * @var string
     *
     * @ORM\Column(name="addressLine", type="string", length=255)
     */
    private $addressLine;

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
     * @ORM\Column(name="opEmail", type="string", length=255, unique=true)
     */
    private $principleEmail;

    /**
     * @var integer
     *
     * @ORM\Column(name="chargifyId", type="integer", length=255, nullable=true)
     */
    private $chargifyId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @OneToMany(targetEntity="Applicant", mappedBy="marketCenter", cascade={"persist"}, orphanRemoval=true)
     */
    private $applicants;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="marketCenters")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     **/
    private $user;

    public function __construct()
    {
        $this->applicants   = new ArrayCollection();
        $this->isActive     = true;
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
     * @return int
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param int $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param int $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getAddressLine()
    {
        return $this->addressLine;
    }

    /**
     * @param string $addressLine
     */
    public function setAddressLine($addressLine)
    {
        $this->addressLine = $addressLine;
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
     * @return mixed
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * @param mixed $isActive
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
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

    public function getSeoUri()
    {
        if($this->city != null) {
            return strtolower( $this->state . '-' . $this->city . '-' . $this->getChargifyId() );
        }

        throw new Exception('Can not SEO without City/State');
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * Add applicants
     *
     * @param \KellerWilliams\Bundle\CareersBundle\Entity\Applicant $applicants
     * @return MarketCenter
     */
    public function addApplicant(\KellerWilliams\Bundle\CareersBundle\Entity\Applicant $applicants)
    {
        $this->applicants[] = $applicants;

        return $this;
    }

    /**
     * Remove applicants
     *
     * @param \KellerWilliams\Bundle\CareersBundle\Entity\Applicant $applicants
     */
    public function removeApplicant(\KellerWilliams\Bundle\CareersBundle\Entity\Applicant $applicants)
    {
        $this->applicants->removeElement($applicants);
    }
}
