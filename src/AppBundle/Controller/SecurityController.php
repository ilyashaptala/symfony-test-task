<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    /**
     * @Configuration\Route("/login", name="app.security.login")
     */
    public function loginAction()
    {
        return $this->redirectToRoute('app.default');
    }

    /**
     * @Configuration\Route("/logout", name="app.security.logout")
     */
    public function logoutAction()
    {
        return $this->redirectToRoute('app.default');
    }

}
