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

        // Si le visiteur est déjà identifié, on le redirige vers l'accueil
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('home');
        }

        // Le service authentication_utils permet de récupérer le nom d'utilisateur
        // et l'erreur dans le cas où le formulaire a déjà été soumis mais était invalide
        // (mauvais mot de passe par exemple)
        $authenticationUtils = $this->get('security.authentication_utils');


        return $this->render('LBMChallengeBundle:Security:login.html.twig', array(
            'last_username' => $authenticationUtils->getLastUserName(),
            'error'         => $authenticationUtils->getLastAuthenticationError(),
        ));

        //return $this->render('LBMUserBundle:Default:index.html.twig');
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
