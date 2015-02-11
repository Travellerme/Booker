<?php

namespace Ens\BookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 */
class Rooms
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
	 
    private $booked;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->booked = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Rooms
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
     * Add booked
     *
     * @param \Ens\BookerBundle\Entity\Booked $booked
     * @return Rooms
     */
    public function addBooked(\Ens\BookerBundle\Entity\Booked $booked)
    {
        $this->booked[] = $booked;

        return $this;
    }

    /**
     * Remove booked
     *
     * @param \Ens\BookerBundle\Entity\Booked $booked
     */
    public function removeBooked(\Ens\BookerBundle\Entity\Booked $booked)
    {
        $this->booked->removeElement($booked);
    }

    /**
     * Get booked
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBooked()
    {
        return $this->booked;
    }
	public function __toString()
	{
		return (string) $this->getName();
	}
}
