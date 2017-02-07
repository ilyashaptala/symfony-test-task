<?php

namespace AppBundle\Controller;

use AppBundle\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @Configuration\Route("/", name="app.default")
     */
    public function indexAction()
    {
        $helper = $this->get('security.authentication_utils');

        $form = $this->createForm(LoginType::class, [
            'username' => $helper->getLastUsername()
        ], [
            'action' => $this->generateUrl('app.security.login')
        ]);

        return $this->render('AppBundle::index.html.twig', [
            'login' => $form->createView()
        ]);
    }
}
