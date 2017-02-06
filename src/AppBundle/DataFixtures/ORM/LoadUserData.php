<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\User;
use AppBundle\Entity\Role;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $role = $manager->getRepository(Role::class);

        foreach ($this->getData() as $data) {
            $user = (new User())
                ->setUsername($data['username'])
                ->setPassword($data['password']);

            foreach ($data['roles'] as $roleName) {
                $user->addRole($role->findOneByRole($roleName));
            }

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * @return array
     */
    private function getData()
    {
        return [
            [
                'username' => 'admin',
                'password' => 'admin',
                'roles'    => ['ROLE_ALLOWED_TO_SWITCH', 'ROLE_ADMIN']
            ],
            [
                'username' => 'demo',
                'password' => 'demo',
                'roles'    => ['ROLE_USER']
            ]
        ];
    }
}
