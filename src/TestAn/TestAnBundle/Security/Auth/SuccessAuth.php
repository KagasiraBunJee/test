<?php
namespace TestAn\TestAnBundle\Security\Auth;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Doctrine\ORM\EntityManager;



class SuccessAuth implements AuthenticationSuccessHandlerInterface {
    
    private $router;
    private $em;
    
    public function __construct(RouterInterface $router, EntityManager $em) 
    {
        $this->router = $router;
        $this->em = $em;
    }
    
    public function onAuthenticationSuccess(Request $request, TokenInterface $token)
    {
        $uri = $this->router->generate('redmine_api_homepage');
        return new RedirectResponse($uri);
    }
}