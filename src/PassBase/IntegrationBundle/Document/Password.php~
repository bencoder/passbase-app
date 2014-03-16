<?php
namespace PassBase\IntegrationBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Password implements \PassBase\Entity\Password
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="PasswordGroup", inversedBy="passwords")
     */
    private $passwordGroup;

    /**
     * @MongoDB\String
     */
    private $data;

    /**
     * @MongoDB\Timestamp
     */
    private $lastUpdatedAt;

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

    /**
     * Set data
     *
     * @param string $data
     * @return self
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Get data
     *
     * @return string $data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set lastUpdatedAt
     *
     * @param timestamp $lastUpdatedAt
     * @return self
     */
    public function setLastUpdatedAt($lastUpdatedAt)
    {
        $this->lastUpdatedAt = $lastUpdatedAt;
        return $this;
    }

    /**
     * Get lastUpdatedAt
     *
     * @return timestamp $lastUpdatedAt
     */
    public function getLastUpdatedAt()
    {
        return $this->lastUpdatedAt;
    }
}
