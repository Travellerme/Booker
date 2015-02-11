<?php

namespace Ens\BookerBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employees
 */
class Employees implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var \DateTime
     */
    private $createdDate;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $bookedRoom;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bookedRoom = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return Employees
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Employees
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set createdDate
     *
     * @param \DateTime $createdDate
     * @return Employees
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;

        return $this;
    }

    /**
     * Get createdDate
     *
     * @return \DateTime 
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * Add bookedRoom
     *
     * @param \Ens\BookerBundle\Entity\Booked $bookedRoom
     * @return Employees
     */
    public function addBookedRoom(\Ens\BookerBundle\Entity\Booked $bookedRoom)
    {
        $this->bookedRoom[] = $bookedRoom;

        return $this;
    }

    /**
     * Remove bookedRoom
     *
     * @param \Ens\BookerBundle\Entity\Booked $bookedRoom
     */
    public function removeBookedRoom(\Ens\BookerBundle\Entity\Booked $bookedRoom)
    {
        $this->bookedRoom->removeElement($bookedRoom);
    }

    /**
     * Get bookedRoom
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookedRoom()
    {
        return $this->bookedRoom;
    }
    /**
     * @ORM\PrePersist
     */
    public function setCreatedDateValue()
    {
        if(!$this->getCreatedDate())
		{
			$this->createdDate = new \DateTime();
		}
    }
	
	public function __toString()
	{
		return (string) $this->getUsername();
	}
	
	public function getRoles()
    {
        return array('ROLE_ADMIN');
    }
 
    public function getSalt()
    {
        return null;
    }
 
    public function eraseCredentials()
    {
 
    }
 
    public function equals(UserInterface $user)
    {
        return $user->getUsername() == $this->getUsername();
    }
}
