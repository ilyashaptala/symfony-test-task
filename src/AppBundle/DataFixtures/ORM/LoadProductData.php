<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach (range(1, 25) as $i) {
            $product = new Product();

            $product->setName(sprintf('Product #%d', $i));
            $product->setPrice(mt_rand(0, 100) + 10 / mt_rand(1, 100));
            $product->setPriority(mt_rand(1, 100) * 10);

            $manager->persist($product);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 30;
    }
}
