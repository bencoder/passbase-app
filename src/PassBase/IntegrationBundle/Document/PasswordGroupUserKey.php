<?php
namespace PassBase\IntegrationBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class PasswordGroupUserKey implements \PassBase\Entity\PasswordGroupUserKey
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     */
    private $key;

    /**
     * @MongoDB\ReferenceOne(targetDocument="User", inversedBy="keys")
     */
    private $user;

    /**
     * @MongoDB\ReferenceOne(targetDocument="PasswordGroup", inversedBy="keys")
     */
    private $passwordGroup;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set key
     *
     * @param string $key
     * @return self
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * Get key
     *
     * @return string $key
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set user
     *
     * @param PassBase\IntegrationBundle\Document\User $user
     * @return self
     */
    public function setUser(\PassBase\IntegrationBundle\Document\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return PassBase\IntegrationBundle\Document\User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set passwordGroup
     *
     * @param PassBase\IntegrationBundle\Document\PasswordGroup $passwordGroup
     * @return self
     */
    public function setPasswordGroup(\PassBase\IntegrationBundle\Document\PasswordGroup $passwordGroup)
    {
        $this->passwordGroup = $passwordGroup;
        return $this;
    }

    /**
     * Get passwordGroup
     *
     * @return PassBase\IntegrationBundle\Document\PasswordGroup $passwordGroup
     */
    public function getPasswordGroup()
    {
        return $this->passwordGroup;
    }
}
