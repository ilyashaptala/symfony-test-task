<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Configuration\Route("/api")
 */
class TestController extends Controller
{

    /**
     * @Configuration\Route("/test", name="api.test")
     * @Configuration\Method("GET")
     */
    public function indexAction()
    {
        return $this->json([]);
    }
}
