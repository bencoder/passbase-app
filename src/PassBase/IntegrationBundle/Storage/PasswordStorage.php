<?php
namespace PassBase\IntegrationBundle\Storage;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;

class PasswordStorage implements \PassBase\Storage\PasswordStorage
{
    /** @var DocumentManager */
    private $manager;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->manager = $manager;
    }

    public function addPassword(\PassBase\Entity\PasswordGroup $group, $encryptedData)
    {
        $document = new \PassBase\IntegrationBundle\Document\Password;
        $document
            ->setPasswordGroup($group)
            ->setData($encryptedData)
            ->setLastUpdatedAt(new \DateTime());
        $this->manager->persist($document);
        $this->manager->flush();
    }

    public function updatePassword(\PassBase\Entity\Password $password, $encryptedData)
    {
        if (!($password instanceof \PassBase\IntegrationBundle\Document\Password)) {
            throw new \InvalidArgumentException("This password storage implementation only supports IntegrationBundle documents");
        }
        $password->setData($encryptedData);
        $this->manager->persist($password);
        $this->manager->flush();
    }

}
