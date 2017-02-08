<?php

namespace ApiBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Configuration\Route("/api")
 */
class UserController extends Controller
{
    /**
     * @Configuration\Route("/users", name="api.users")
     * @Configuration\Method("GET")
     */
    public function indexAction()
    {
        return $this->json($this->getUser());
    }

    /**
     * @Configuration\Route("/users/{id}", name="api.users.update")
     * @Configuration\Method("POST")
     */
    public function updateAction(User $user)
    {
        $user->setLimits($user->getLimits() - 1);

        $this->getDoctrine()->getManager()->flush();

        return $this->json($user);
    }
}
