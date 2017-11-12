<?php

namespace LBM\ChallengeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {

        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        $authenticationUtils = $this->get('security.authentication_utils');


        return $this->render('LBMChallengeBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUserName(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));

    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginChekAction() {
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction() {

    }
}
