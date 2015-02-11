<?php

namespace Ens\BookerBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * BookedRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BookedRepository extends EntityRepository
{
	public function bookedCheck($userId,$roomId,$selectedDateTS,$dateWithHours){

		$qb = $this->createQueryBuilder('b')
			->where('b.bookedTime >= :date and b.bookedTime < :lastDate and b.users = :userId and b.booked = :roomId')
			->setParameter('date', date('Y-m-d ', $selectedDateTS)."00:00:00")
			->setParameter('lastDate', date('Y-m-d H:i:s', strtotime("midnight", strtotime('+1 day', $selectedDateTS))))
			->setParameter('userId', $userId)
			->setParameter('roomId', $roomId);
		$query = $qb->getQuery();
		$data = $query->getResult();
		if(!empty($data)){
			return array('success'=>false,'message'=>'This room is booked already');
		}
		
		$qb = $this->createQueryBuilder('b')
			->where('b.bookedTime >= :date and b.bookedTime < :lastDate and b.users = :userId')
			->setParameter('date', date('Y-m-d H:i:s', $dateWithHours))
			->setParameter('userId', $userId)
			->setParameter('lastDate', date('Y-m-d H:i:s', $dateWithHours+1*3600));
		$query = $qb->getQuery();
		$data = $query->getResult();
		if(!empty($data)){
			return array('success'=>false,'message'=>'You can book only one room for this time period');
		}
		return array('success'=>true);

		#\Doctrine\Common\Util\Debug::dump($data);

	}
	public function getBookingInfo($allRooms,$searchDate = null)
    {	

		if(!$searchDate) $searchDate = date("Y-m-d",time());
		$dt = new \DateTime($searchDate);
		$date = $dt->format('Y-m-d') . " 00:00:00";
		$unixDate = strtotime("midnight", $dt->getTimestamp());
		$result = array();
	
		
		
		$query = $this->getEntityManager()
            ->createQuery('SELECT r.name,r.id as roomId,b.bookedTime,e.id as userId,e.username FROM EnsBookerBundle:Booked b '
				.'LEFT JOIN b.users e LEFT JOIN b.booked r '
				.'WHERE b.bookedTime >= :date and b.bookedTime < :lastDate')
			->setParameter('date', $date)
			->setParameter('lastDate', date("Y-m-d", strtotime('+1 day', $unixDate)) . " 00:00:00");
	
		$data = $query->getResult();
		$bookedRooms = array();
		
		foreach($data as $key=>$val){
			if(!isset($bookedRooms[$val['roomId']])){
				$bookedRooms[$val['roomId']]['name'] = $val['name'];
				$bookedRooms[$val['roomId']]['id'] = $val['roomId'];
				$bookedRooms[$val['roomId']]['booked'] = array();
			}
		
			$bookedRooms[$val['roomId']]['booked'][(string)$val['bookedTime']->format('G')] = array("id"=>$val['userId'],"name"=>$val['username']);
			
		}
		$result = array_map(function($index) use ($bookedRooms){
			$index['booked'] = array();
			if(isset($bookedRooms[$index['id']])){
				$index = $bookedRooms[$index['id']];
			}
			return $index;			
		},$allRooms);
		return $result;
		
    }
}
