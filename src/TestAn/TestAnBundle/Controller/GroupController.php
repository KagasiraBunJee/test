<?php

namespace TestAn\TestAnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TestAn\TestAnBundle\Entity\Groups;
use TestAn\TestAnBundle\Form\GroupsType;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/groups")
 */
class GroupController extends Controller
{
    /**
     * @Route("/add", name="add_group")
     * @Template()
     */
    public function addAction(Request $request)
    {
        $form = $this->createForm(new GroupsType());
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $data = $form->getData();
            $em = $this->getDoctrine()->getManager();
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
                
    }

}
