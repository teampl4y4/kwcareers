<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * User
 *
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var ArrayCollection
     * @OneToMany(targetEntity="MarketCenter", mappedBy="user")
     */
    private $marketCenters;

    public function __construct()
    {
        parent::__construct();
        $this->marketCenters = new ArrayCollection();
    }

    public function setEmail($email)
    {
        $this->email    = $email;
        $this->username = $email;
    }

    public function setEmailCanonical($emailCanonical){
        $this->emailCanonical       = $emailCanonical;
        $this->usernameCanonical    = $emailCanonical;
    }

    /**
     * @return ArrayCollection
     */
    public function getMarketCenters()
    {
        return $this->marketCenters;
    }

    /**
     * @param mixed $marketCenters
     */
    public function setMarketCenters(ArrayCollection $marketCenters)
    {
        $this->marketCenters = $marketCenters;
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
}
