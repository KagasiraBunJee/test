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
        $em = $this->getDoctrine()->getManager();
        $factory = $this->get('security.encoder_factory');
        $form = $this->createForm(new UserType());
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $data = $form->getData();
            
            $em->persist($data);
            $em->flush();
        }
        
        return array(
                'form' => $form->createView()
            );
    }

    /**
     * @Route("/")
     * @Template()
     */
    public function listAction()
    {
        return array(
                // ...
            );
    }

}
