<?php

namespace Ens\BookerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\JsonResponse;
class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('EnsBookerBundle:Default:index.html.twig', array('name' => $name));
    }
	
	public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
 
        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
		if($request->isXmlHttpRequest()) {
			
            $login = $this->renderView('EnsBookerBundle:Default:login.html.twig', array(
				// last username entered by the user
				'last_username' => $session->get(SecurityContext::LAST_USERNAME),
				'error'         => $error,
			));
			return new JsonResponse(array('login' => $login));
        }
		return $this->render('EnsBookerBundle:Default:login.html.twig', array(
			// last username entered by the user
			'last_username' => $session->get(SecurityContext::LAST_USERNAME),
			'error'         => $error,
		));
		#return $this->redirect($this->generateUrl('ens_booked'));

    }
}
