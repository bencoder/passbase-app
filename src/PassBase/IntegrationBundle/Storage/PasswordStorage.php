<?php
namespace PassBase\IntegrationBundle\Storage;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\DocumentRepository;

class PasswordGroupUserKeyStorage implements \PassBase\Storage\PasswordGroupStorage
{
    /** @var DocumentRepository */
    private $repository;

    /**
     * @param DocumentManager $manager
     */
    public function __construct(DocumentManager $manager)
    {
        $this->repository = $manager->getRepository('PassBaseIntegrationBundle:Password');
    }

}
