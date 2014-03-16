<?php
namespace PassBase\IntegrationBundle\Storage;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;

class PasswordGroupUserKeyStorage implements \PassBase\Storage\PasswordGroupUserKeyStorage
{
    /** @var DocumentRepository */
    private $repository;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->repository = $manager->getRepository('PassBaseIntegrationBundle:PasswordGroupUserKey');
    }

    /**
     * {@inherit}
     */
    public function getKeyForUserAndGroup(
        \PassBase\Entity\User $user,
        \PassBase\Entity\PasswordGroup $group
    ) {
        return $this->repository->findOneBy(array(
            "user" => $user,
            "passwordGroup" => $group
        ));
    }
}
