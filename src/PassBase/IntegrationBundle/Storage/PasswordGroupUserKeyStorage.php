<?php
namespace PassBase\IntegrationBundle\Storage;

use \Doctrine\ODM\MongoDB\DocumentManager;
use \Doctrine\ODM\MongoDB\DocumentRepository;
use \PassBase\Entity\PasswordGroup;
use \PassBase\IntegrationBundle\Document\PasswordGroupUserKey;
use \PassBase\Entity\User;

class PasswordGroupUserKeyStorage implements \PassBase\Storage\PasswordGroupUserKeyStorage
{
    /** @var DocumentRepository */
    private $repository;

    /** @var DocumentManager */
    private $manager;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->repository = $manager->getRepository('PassBaseIntegrationBundle:PasswordGroupUserKey');
        $this->manager = $manager;
    }

    /**
     * @see \PassBase\Storage\PasswordGroupUserKeyStorage::getKeyForUserAndGroup
     */
    public function getKeyForUserAndGroup(
        User $user,
        PasswordGroup $group
    ) {
        return $this->repository->findOneBy(array(
            "user" => $user,
            "passwordGroup" => $group
        ));
    }

    /**
     * @see \PassBase\Storage\PasswordGroupUserKeyStorage::createKeyForUserAndGroup
     */
    public function createKeyForUserAndGroup(User $user, PasswordGroup $group, $key)
    {
        $document = new PasswordGroupUserKey();
        $document
            ->setUser($user)
            ->setPasswordGroup($group)
            ->setKey($key);
        $this->manager->persist($document);
        $this->manager->flush();
    }

}
