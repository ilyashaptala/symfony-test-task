<?php

namespace AppBundle\Repository;

use AppBundle\Entity\User;

class SearchHistoryRepository extends Repository
{
    /**
     * @param User $user
     *
     * @return \AppBundle\Entity\SearchHistory
     */
    public function lastByUser(User $user)
    {
        return $this
                ->createQueryBuilder('p')
                ->where('p.user = :user')
                ->setParameter('user', $user->getId())
                ->orderBy('p.createdAt', 'desc')
                ->setMaxResults(1)
                ->getQuery()
                ->getOneOrNullResult();
    }
}
