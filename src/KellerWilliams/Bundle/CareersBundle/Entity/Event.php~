<?php

namespace KellerWilliams\Bundle\CareersBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Event
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="datetime")
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="datetime")
     */
    private $endTime;

    /**
     * @var boolean
     *
     * @ORM\Column(name="allDay", type="boolean")
     */
    private $allDay;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timezone", type="datetimetz")
     */
    private $timezone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isActive", type="boolean")
     */
    private $isActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="rsvp_max", type="smallint")
     */
    private $rsvpMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="current_rsvp", type="smallint")
     */
    private $currentRsvp;


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
     * Set name
     *
     * @param string $name
     * @return Event
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
     * Set description
     *
     * @param string $description
     * @return Event
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
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return Event
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime 
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return Event
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime 
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set allDay
     *
     * @param boolean $allDay
     * @return Event
     */
    public function setAllDay($allDay)
    {
        $this->allDay = $allDay;

        return $this;
    }

    /**
     * Get allDay
     *
     * @return boolean 
     */
    public function getAllDay()
    {
        return $this->allDay;
    }

    /**
     * Set timezone
     *
     * @param \DateTime $timezone
     * @return Event
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return \DateTime 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Event
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set rsvpMax
     *
     * @param integer $rsvpMax
     * @return Event
     */
    public function setRsvpMax($rsvpMax)
    {
        $this->rsvpMax = $rsvpMax;

        return $this;
    }

    /**
     * Get rsvpMax
     *
     * @return integer 
     */
    public function getRsvpMax()
    {
        return $this->rsvpMax;
    }

    /**
     * Set currentRsvp
     *
     * @param integer $currentRsvp
     * @return Event
     */
    public function setCurrentRsvp($currentRsvp)
    {
        $this->currentRsvp = $currentRsvp;

        return $this;
    }

    /**
     * Get currentRsvp
     *
     * @return integer 
     */
    public function getCurrentRsvp()
    {
        return $this->currentRsvp;
    }
}
