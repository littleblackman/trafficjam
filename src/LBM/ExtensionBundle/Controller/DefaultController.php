<?php

namespace LBM\ExtensionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    /**
     * Change the locale for the current user
     * @Route("/setlocale/{language}", name="setlocale")
     */
    public function setLocaleAction(Request $request, $language = null)
    {
        if($language != null)
        {
            // On enregistre la langue en session
            $this->get('session')->set('_locale', $language);
        }
        // on tente de rediriger vers la page d'origine

        $url = $request->headers->get('referer');
        if(empty($url))
        {
            $url = $this->container->get('router')->generate('identificationPage');
        }

        return $this->redirect($url);

    }

}
