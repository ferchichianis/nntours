<?php
/**
 * InitializerTest.php
 *
 * @date        29/04/2014
 * @file        InitializerTest.php
 */

namespace CoreTest\Form;
use Core\Form\Initializer;

/**
 * InitializerTest
 */
class InitializerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Initializer
     */
    protected $instance;


    public function setUp()
    {
        $this->instance = new Initializer();
    }

    public function testInitialize()
    {
        $mockEntityManager = $this->getMock('Doctrine\ORM\EntityManager', [], [], '',false);

        $mockServiceManager = $this->getMock('Zend\ServiceManager\ServiceManager');
        $mockServiceManager->expects($this->once())
            ->method('get')
            ->with('em')
            ->will($this->returnValue($mockEntityManager));

        $mockFormElementManager = $this->getMock('Zend\Form\FormElementManager');
        $mockFormElementManager->expects($this->once())
            ->method('getServiceLocator')
            ->will($this->returnValue($mockServiceManager));

        $mockInstance = $this->getMock('Application\Form\User\User');
        $mockInstance->expects($this->once())
            ->method('getHydratorClass')
            ->will($this->returnValue('DoctrineObject'));

        $mockInstance->expects($this->once())
            ->method('getEntityClass')
            ->will($this->returnValue('CoreTest\Form\EntityInitializerStub'));

        $mockInstance->expects($this->once())
            ->method('setHydrator');

        $this->instance->initialize($mockInstance, $mockFormElementManager);

        $mockInstance = $this->getMock('Application\Form\User\User');
        $mockInstance->expects($this->once())
            ->method('getHydratorClass')
            ->will($this->returnValue('toto'));

        $this->setExpectedException('\Exception', 'Hydrator must be implemented');
        $this->instance->initialize($mockInstance, $mockFormElementManager);

    }

}


class EntityInitializerStub
{

}