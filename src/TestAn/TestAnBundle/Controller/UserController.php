<?php

namespace TestAn\TestAnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TestAn\TestAnBundle\Entity\User;
use TestAn\TestAnBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpKernel\Exception\HttpNotFoundException;

/**
 * @Route("/users")
 */
class UserController extends Controller
{
    /**
     * @Route("/add")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $user = new User();
        $em = $this->getDoctrine()->getManager();
        $factory = $this->get('security.encoder_factory');
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $em->persist($user);
            $em->flush();
        }
        
        return array(
                'form' => $form->createView()
            );
    }

    /**
     * @Route("/", name="user_list")
     * @Template()
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $users = $em->getRepository("TestAnTestAnBundle:User")->findAll();
        
        return array(
            'users' => $users
        );
    }
    
    /**
     * @Route("/{id}", name="view_user")
     * @ParamConverter("user", class="TestAnTestAnBundle:User")
     * @Template()
     */
    public function viewAction(User $user)
    {
        if($user === null)
        {
            throw $this->createException('Something went wrong');
        }
        
        return array(
            'user' => $user
        );
    }

}
