<?php
namespace PassBase\IntegrationBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class PasswordGroup implements \PassBase\Entity\PasswordGroup
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\String
     */
    private $name;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Password", mappedBy="passwordGroup")
     */
    private $passwords;

    /**
     * @MongoDB\ReferenceMany(targetDocument="PasswordGroupUserKey", mappedBy="passwordGroup")
     */
    private $keys;


    public function __construct()
    {
        $this->passwords = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add password
     *
     * @param PassBase\IntegrationBundle\Document\Password $password
     */
    public function addPassword(\PassBase\IntegrationBundle\Document\Password $password)
    {
        $this->passwords[] = $password;
    }

    /**
     * Remove password
     *
     * @param PassBase\IntegrationBundle\Document\Password $password
     */
    public function removePassword(\PassBase\IntegrationBundle\Document\Password $password)
    {
        $this->passwords->removeElement($password);
    }

    /**
     * Get passwords
     *
     * @return Doctrine\Common\Collections\Collection $passwords
     */
    public function getPasswords()
    {
        return $this->passwords;
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
