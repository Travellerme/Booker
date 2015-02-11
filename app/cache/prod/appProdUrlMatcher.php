<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/ens_booked')) {
            // ens_booked
            if (rtrim($pathinfo, '/') === '/ens_booked') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'ens_booked');
                }

                return array (  '_controller' => 'Ens\\BookerBundle\\Controller\\BookedController::indexAction',  '_route' => 'ens_booked',);
            }

            // ens_booked_create
            if ($pathinfo === '/ens_booked/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_ens_booked_create;
                }

                return array (  '_controller' => 'Ens\\BookerBundle\\Controller\\BookedController::createAction',  '_route' => 'ens_booked_create',);
            }
            not_ens_booked_create:

            // ens_booked_delete
            if ($pathinfo === '/ens_booked/delete') {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_ens_booked_delete;
                }

                return array (  '_controller' => 'Ens\\BookerBundle\\Controller\\BookedController::deleteAction',  '_route' => 'ens_booked_delete',);
            }
            not_ens_booked_delete:

        }

        // ens_booker_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'ens_booker_homepage');
            }

            return array (  '_controller' => 'Ens\\BookerBundle\\Controller\\BookedController::indexAction',  '_route' => 'ens_booker_homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Ens\\BookerBundle\\Controller\\DefaultController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
