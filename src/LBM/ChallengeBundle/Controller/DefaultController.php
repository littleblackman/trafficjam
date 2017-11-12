<?php

namespace LBM\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="default")
     */
    public function indexAction()
    {

        return $this->redirectToRoute('login');
    }



    /**
     * @Route("/home", name="home")
     */
    public function homeAction()
    {

        return $this->render('LBMChallengeBundle:Default:index.html.twig');
    }


}
