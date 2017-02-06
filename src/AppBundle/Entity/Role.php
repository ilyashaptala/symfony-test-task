<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * @ORM\Table(name="app_roles")
 * @ORM\Entity
 */
class Role implements RoleInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer", options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     */
    private $role;

    /**
     * @param string $role The role name.
     */
    public function __construct($role)
    {
        $this->role = (string) $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getRole();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->role
        ]);
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->role
            ) = unserialize($serialized);
    }
}
