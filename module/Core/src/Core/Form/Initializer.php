<?php
/**
 * Initializer.php
 *
 * @date        29/04/2014
 * @file        Initializer.php
 */

namespace Core\Form;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;

/**
 * Initializer
 */
class Initializer implements InitializerInterface
{
    /**
     * Initializer
     *
     * @param                         $instance
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return mixed|void
     * @throws \Exception
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance InstanceOf HydratorAwareInterface) {
            $hydratorClass = $instance->getHydratorClass();

            switch ($hydratorClass) {
                case ('DoctrineObject'):
                case ('\DoctrineModule\Stdlib\Hydrator\DoctrineObject'):
                    $hydrator = new DoctrineObject($serviceLocator->getServiceLocator()->get('em'));

                    break;
                default:
                    if (class_exists($hydratorClass)) {
                        $hydrator = new $hydratorClass;
                    } else {
                        throw new Exception('Hydrator must be implemented');
                    }
                    break;
            }


            $instance->setHydrator($hydrator);
        }


        if ($instance instanceof EntityAwareInterface) {
            $entityClass = $instance->getEntityClass();
            $instance->setObject(new $entityClass);
        }

        if ($instance instanceof ObjectManagerAwareInterface) {
            $instance->setObjectManager($serviceLocator->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
    }
} 