<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

abstract class Repository extends EntityRepository
{

    /**
     * @return int
     */
    public function count()
    {
        return (int) $this
                ->createQueryBuilder('t')
                ->select('COUNT(t.id)')
                ->getQuery()
                ->getSingleScalarResult();
    }
}
