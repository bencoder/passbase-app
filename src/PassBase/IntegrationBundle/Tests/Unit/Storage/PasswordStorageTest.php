<?php
namespace PassBase\IntegrationBundle\Tests\Unit\Storage;

use \Mockery as M;
use \PassBase\IntegrationBundle\Storage\PasswordStorage;

class PasswordStorageTest extends \PHPUnit_Framework_TestCase
{

    /** @var PasswordStorage */
    private $storage;

    public function setUp()
    {
        $this->manager = M::mock('\Doctrine\ODM\MongoDB\DocumentManager');
        $this->storage = new PasswordStorage($this->manager);
    }

    public function testAddPassword()
    {
        $group = M::mock('\PassBase\IntegrationBundle\Document\PasswordGroup');
        $encryptedData = "encrypted_data";
        $this->manager->shouldReceive('persist')->with(
            M::on(
                function($arg) use ($group, $encryptedData) {
                    return $arg->getPasswordGroup() == $group &&
                        $arg->getData() == $encryptedData;
                }
            )
        )->once();
        $this->manager->shouldReceive('flush');
        $this->storage->addPassword($group, $encryptedData);
    }
}
