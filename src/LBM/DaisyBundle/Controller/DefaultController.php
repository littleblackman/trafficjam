<?php

namespace LBM\DaisyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/daisy", name="home")
     *
     */
    public function indexAction(Request $request)
    {

/*
        $connect = $this->container->get('lbm_deezer_connect');




        if(!isset($_REQUEST["code"])) {

            $state = md5(uniqid(rand(), TRUE));
            $this->get('session')->set('state', $state);
            $connect->getToken($state);
        } else {

            $code = $_REQUEST["code"];

            $state = $this->get('session')->get('state');

            if($_REQUEST['state'] == $state) {

                //$connect->getDeezerUserName($code);
                $connect->getContentPlaylist($code);

            } else {
                echo("The state does not match. You may be a victim of CSRF.");
            }

        }*/

        return $this->render('LBMDaisyBundle:Default:index.html.twig');
    }

    /**
     * @Route("/playlist", name="getPlayList")
     */
    public function getPLayList(Request $request)
    {
        $connect = $this->container->get('lbm_deezer_connect');
        $connect->getPlayList($request);

    }


    /**
     * @Route("/token", name="getToken")
     *
     */
    public function getTokenAction()
    {

        $connect = $this->container->get('lbm_deezer_connect');
        echo $connect->getContentPlaylist();
    }

}
