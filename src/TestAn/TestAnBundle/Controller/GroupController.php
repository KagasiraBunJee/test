<?php

namespace TestAn\TestAnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use TestAn\TestAnBundle\Entity\Groups;
use TestAn\TestAnBundle\Form\GroupsType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

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
        $group = new Groups();
        $form = $this->createForm(new GroupsType(),$group);
        $form->handleRequest($request);
        
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($group);
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
    {}
    
    /**
     * @Route("/{id}", name="view_group")
     * @ParamConverter("group", class="TestAnTestAnBundle:Groups")
     * @Template()
     */
    public function viewAction(Groups $group)
    {
        
    }

}
