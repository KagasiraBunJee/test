<?php

namespace TestAn\TestAnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use TestAn\TestAnBundle\Entity\User;
use TestAn\TestAnBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/users/{id}", name="view_user")
     * @Template()
     */
    public function viewAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $user = $em->getRepository("TestAnTestAnBundle:User")->find($id);
        
        if($user === null)
        {
            throw new TransformationFailedException(sprintf(
                    'There is no data with id "%s"', $id
                ));
        }
        
        return array(
            'user' => $user
        );
    }

}
