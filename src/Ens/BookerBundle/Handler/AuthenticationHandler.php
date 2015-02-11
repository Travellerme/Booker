<?php
namespace Ens\BookerBundle\Handler;

// "use" statements here
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticationHandler
implements AuthenticationSuccessHandlerInterface,
           AuthenticationFailureHandlerInterface
{
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        if ($request->isXmlHttpRequest()) {
            $result = array('success' => true,'user'=>$token->getUser()->getUsername());
            return new Response(json_encode($result));
        } else {
            // Handle non XmlHttp request here
        }
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        if ($request->isXmlHttpRequest()) {
            $result = array('success' => false,'message'=>$exception->getMessage());
            return new Response(json_encode($result));
        } else {
            // Handle non XmlHttp request here
        }
    }
}
?>