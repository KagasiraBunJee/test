<?php

namespace TestAn\TestAnBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => "me");
    }
    
    /**
     * @Route("/display/{name}")
     * @Template("TestAnTestAnBundle:Default:index.html.twig", vars={"name"})
     */
    public function displayAction($name)
    {
        //return array('name' => $name);
    }
}
