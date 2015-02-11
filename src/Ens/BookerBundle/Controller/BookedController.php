<?php

namespace Ens\BookerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Ens\BookerBundle\Entity\Booked;
use Ens\BookerBundle\Form\BookedType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
/**
 * Booked controller.
 *
 */
class BookedController extends Controller
{

    /**
     * Lists all Booked entities.
     *
     */
    public function indexAction(Request $request)
    {
		$selectedDate = $request->request->get('selectedDate');
        $em = $this->getDoctrine()->getManager();
		$allRooms = $em->getRepository('EnsBookerBundle:Rooms')->getRooms();
        $rooms = $em->getRepository('EnsBookerBundle:Booked')->getBookingInfo($allRooms,$selectedDate);
		$layout = 'index.html.twig';
		if($selectedDate) $layout = 'table.html.twig';
      
        return $this->render('EnsBookerBundle:Booked:'.$layout, array(
            'rooms' => $rooms,
            'minAvailable' => $this->container->getParameter('minAvailable'),
            'range' => $this->container->getParameter('maxAvailable') - $this->container->getParameter('minAvailable'),
            'maxAvailable' => $this->container->getParameter('maxAvailable'),
        ));
    }
	
    /**
     * Creates a new Booked entity.
     *
     */
    public function createAction(Request $request)
    {
	
		if(!$request->isXmlHttpRequest()) {
			throw new NotFoundHttpException("Page not found");
		}
		$hour = $request->request->get('hour');
		$roomId = $request->request->get('roomId');
		$selectedDate = $request->request->get('selectedDate');
		$selectedDateTS = strtotime($selectedDate);
		$dateWithHours = strtotime($selectedDate) + $hour * 3600;
	
		if (!$selectedDate || !$hour || !$roomId || $hour>$this->container->getParameter('maxAvailable') 
			|| $hour<$this->container->getParameter('minAvailable') 
			|| $selectedDateTS < strtotime("midnight", time())
			|| false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
			return new JsonResponse(array('success' => false,'message'=>'Something wrong. You cannot book room in past and your date must be valid'));
		}
		/*$this
			->get('doctrine')
			->getConnection()
			->getConfiguration()
			->setSQLLogger(new \Doctrine\DBAL\Logging\EchoSQLLogger());*/
		
		$user = $this->get('security.token_storage')->getToken()->getUser();
		$em = $this->getDoctrine()->getManager();

		$booked = $em->getRepository('EnsBookerBundle:Booked')->bookedCheck($user->getId(),$roomId,$selectedDateTS,$dateWithHours);
		if(!$booked['success']){
			return new JsonResponse($booked);
		}
		
		$entity = new Booked();
		$entity->setBookedTime(new \DateTime(date('Y-m-d H:i:s', $dateWithHours)));

		$entity->setBooked($em->getRepository('EnsBookerBundle:Rooms')->findOneById($roomId));
		#\Doctrine\Common\Util\Debug::dump($entity->getRooms());
		#exit;
		
		$entity->setUsers($em->getRepository('EnsBookerBundle:Employees')->findOneById($user));
		$em->persist($entity);
		$em->flush();
		$booked['message'] = "The room has been booked successfully";
		
		return new JsonResponse($booked);
		
    }

    
    /**
     * Deletes a Booked entity.
     *
     */
    public function deleteAction(Request $request)
    {
		$hour = $request->request->get('hour');
		$roomId = $request->request->get('roomId');
		$selectedDate = $request->request->get('selectedDate');
		$selectedDateTS = strtotime($selectedDate);
		$dateWithHours = strtotime($selectedDate) + $hour * 3600;
	
		if (!$selectedDate || !$hour || !$roomId || $hour>$this->container->getParameter('maxAvailable') 
			|| $hour<$this->container->getParameter('minAvailable') 
			|| $selectedDateTS < strtotime("midnight", time())
			|| false === $this->get('security.context')->isGranted('ROLE_ADMIN')) {
			return new JsonResponse(array('success' => false,'message'=>'Something wrong. You cannot decline booked room in past and your date must be valid'));
		}
		
		$user = $this->get('security.token_storage')->getToken()->getUser();
		$em = $this->getDoctrine()->getManager();
		
		$entity = $em->getRepository('EnsBookerBundle:Booked')->findBy(array(
			'users' => $user, 
			'bookedTime' => new \DateTime(date('Y-m-d H:i:s', $dateWithHours)),
			'booked' => $roomId
		));
		if (empty($entity)) {
			return new JsonResponse(array('success' => false,'message'=>'You don\'t have permissions to delete this record'));
		}
		
		$em->remove($entity[0]);
        $em->flush();
		
		return new JsonResponse(array('success' => true,'message'=>'Your booking has been declined successfully'));
    }

}
