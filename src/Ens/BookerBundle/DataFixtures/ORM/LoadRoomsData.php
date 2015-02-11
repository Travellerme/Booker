<?php

namespace Ens\BookerBundle\DataFixtures\ORM;
 
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Ens\BookerBundle\Entity\Rooms;
 
class LoadRoomsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        for($i=1;$i<=3;$i++){
			$room = new Rooms();
			$room->setName('Room '.$i);
			$this->addReference('bookedRoomId'.$i, $room);
			$em->persist($room);
		}
		
        $em->flush();
    }
 
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}