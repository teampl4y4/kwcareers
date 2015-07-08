<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

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

    public function __construct()
    {
        parent::__construct();
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
}
