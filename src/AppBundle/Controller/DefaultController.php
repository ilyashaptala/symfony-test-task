<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    /**
     * @Configuration\Route("/", name="app.default")
     */
    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig');
    }
}
