<?php

namespace Ens\BookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booked
 */
class Booked
{
    /**
     * @var integer
     */
    private $id;

      /**
     * @var \Ens\BookerBundle\Entity\Employees
     */
    private $users;


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
     * Set users
     *
     * @param \Ens\BookerBundle\Entity\Employees $users
     * @return Booked
     */
    public function setUsers(\Ens\BookerBundle\Entity\Employees $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get users
     *
     * @return \Ens\BookerBundle\Entity\Employees 
     */
    public function getUsers()
    {
        return $this->users;
    }
    /**
     * @var \DateTime
     */
    private $bookedTime;


    /**
     * Set bookedTime
     *
     * @param \DateTime $bookedTime
     * @return Booked
     */
    public function setBookedTime($bookedTime)
    {
        $this->bookedTime = $bookedTime;

        return $this;
    }

    /**
     * Get bookedTime
     *
     * @return \DateTime 
     */
    public function getBookedTime()
    {
        return $this->bookedTime;
    }
    /**
     * @var \Ens\BookerBundle\Entity\Rooms
     */
    private $booked;


    /**
     * Set booked
     *
     * @param \Ens\BookerBundle\Entity\Rooms $booked
     * @return Booked
     */
    public function setBooked(\Ens\BookerBundle\Entity\Rooms $booked = null)
    {
        $this->booked = $booked;

        return $this;
    }

    /**
     * Get booked
     *
     * @return \Ens\BookerBundle\Entity\Rooms 
     */
    public function getBooked()
    {
        return $this->booked;
    }
}
