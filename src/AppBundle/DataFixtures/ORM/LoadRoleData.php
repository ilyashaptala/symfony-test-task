<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Role;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadRoleData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        foreach ($this->getRoles() as $role) {
            $manager->persist(new Role($role));
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @return array
     */
    private function getRoles()
    {
        return [
            'ROLE_USER',
            'ROLE_ADMIN',
            'ROLE_SUPER_ADMIN',
            'ROLE_ALLOWED_TO_SWITCH'
        ];
    }
}
