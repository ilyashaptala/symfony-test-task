<?php

namespace AppBundle\Repository;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

class UserRepository extends Repository implements UserLoaderInterface
{

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('t')
                ->where('t.username = :username')
                ->setParameter('username', $username)
                ->getQuery()
                ->getOneOrNullResult();
    }
}
