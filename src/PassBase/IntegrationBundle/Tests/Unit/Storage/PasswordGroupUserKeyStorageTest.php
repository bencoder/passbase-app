<?php
namespace PassBase\IntegrationBundle\Tests\Unit\Storage;

use \PassBase\IntegrationBundle\Storage\PasswordGroupUserKeyStorage;
use \Mockery as M;

class PasswordGroupUserKeyStorageTest extends \PHPUnit_Framework_TestCase
{
    /** @var PasswordGroupUserKeyStorage */
    private $storage;

    public function setUp()
    {
        $this->documentManager = M::mock('\Doctrine\ODM\MongoDB\DocumentManager');
        $this->repository = M::mock('\Doctrine\ODM\MongoDB\DocumentRepository');
        $this->documentManager->shouldReceive('getRepository')->andReturn($this->repository);
        $this->storage = new PasswordGroupUserKeyStorage($this->documentManager);
    }

    public function testGetKeyForUserAndGroup()
    {
        $user = M::mock('\PassBase\Entity\User');
        $group = M::mock('\PassBase\Entity\PasswordGroup');
        $key = M::mock('\PassBase\Entity\PasswordGroupUserKey');
        $this->repository->shouldReceive('findOneBy')->with(array('user' => $user, 'passwordGroup' => $group))->andReturn($key);
        $this->assertEquals($key, $this->storage->getKeyForUserAndGroup($user, $group));
    }

    public function testCreateKeyForUserAndGroup()
    {
        $user = M::mock('\PassBase\IntegrationBundle\Document\User');
        $group = M::mock('\PassBase\IntegrationBundle\Document\PasswordGroup');
        $key = "encrypted_data";

        $this->documentManager->shouldReceive('persist')->with(
            M::on(function($arg) use ($user, $group, $key) {
                return
                    $arg->getUser() == $user &&
                    $arg->getPasswordGroup() == $group &&
                    $arg->getKey() == $key;
            })
        )->once();

        $this->documentManager->shouldReceive('flush');

        $this->storage->createKeyForUserAndGroup($user, $group, $key);
    }
}
