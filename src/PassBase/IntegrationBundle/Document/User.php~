<?php
namespace PassBase\IntegrationBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class User implements \PassBase\Entity\User
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     */
    private $username;

    /**
     * @MongoDB\String
     */
    private $password;

    /**
     * @MongoDB\ReferenceMany(targetDocument="PasswordGroupUserKey", mappedBy="user")
     */
    private $keys;


    public function __construct()
    {
        $this->keys = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * Get username
     *
     * @return string $username
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add key
     *
     * @param PassBase\IntegrationBundle\Document\PasswordGroupUserKey $key
     */
    public function addKey(\PassBase\IntegrationBundle\Document\PasswordGroupUserKey $key)
    {
        $this->keys[] = $key;
    }

    /**
     * Remove key
     *
     * @param PassBase\IntegrationBundle\Document\PasswordGroupUserKey $key
     */
    public function removeKey(\PassBase\IntegrationBundle\Document\PasswordGroupUserKey $key)
    {
        $this->keys->removeElement($key);
    }

    /**
     * Get keys
     *
     * @return Doctrine\Common\Collections\Collection $keys
     */
    public function getKeys()
    {
        return $this->keys;
    }
}
