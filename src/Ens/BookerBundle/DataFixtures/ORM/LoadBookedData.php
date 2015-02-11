<?php

namespace Ens\BookerBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ens\BookerBundle\Entity\Booked;
 
class LoadBookedData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        for($i=1;$i<=3;$i++){
			$room = new Booked();
			$room->setBookedTime(new \DateTime(date('Y-m-d H:i:s', strtotime("midnight", time())+(10+$i)*3600)));
			$bookedRoomId = $this->getReference('bookedRoomId'.$i);
			$room->setBooked($bookedRoomId);
			$member = $this->getReference('member'.$i);
			$room->setUsers($member);
			$em->persist($room);
		}
		
        $em->flush();
    }
 
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}