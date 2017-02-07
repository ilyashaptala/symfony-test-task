<?php

namespace AppBundle\Repository;

use Symfony\Component\HttpFoundation\ParameterBag;

class ProductRepository extends Repository
{
    const LATEST_MAX = 10;
    const TYPEAHEAD_MAX = 5;

    /**
     * @param int $limit
     *
     * @return array
     */
    public function latest($limit = self::LATEST_MAX)
    {
        return $this
            ->createQueryBuilder('p')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param string $name
     *
     * @return array
     */
    public function findLikeName($name, $limit = self::TYPEAHEAD_MAX)
    {
        return $this
            ->createQueryBuilder('p')
            ->where('p.name like :name')
            ->setParameter('name', "%$name%")
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * @param ParameterBag $parameters
     *
     * @return array
     */
    public function search(ParameterBag $parameters)
    {
        $query = $this->createQueryBuilder('p');

        if ($parameters->has('name')) {
            $name = $parameters->get('name');

            $query
                ->where('p.name like :name')
                ->setParameter('name', "%$name%");
        }

        if ($parameters->has('priceMin')) {
            $priceMin = $parameters->get('priceMin');

            $query
                ->andWhere('p.price >= :priceMin')
                ->setParameter('priceMin', $priceMin);
        }

        if ($parameters->has('priceMax')) {
            $priceMax = $parameters->get('priceMax');

            $query
                ->andWhere('p.price <= :priceMax')
                ->setParameter('priceMax', $priceMax);
        }

        if ($parameters->has('volume')) {
            $volume = $parameters->get('volume');

            $query
                ->andWhere('p.priority >= :volume')
                ->setParameter('volume', $volume);
        }

        return $query->getQuery()->getResult();

    }
}
