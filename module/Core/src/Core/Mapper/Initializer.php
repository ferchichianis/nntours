<?php
/**
 * Initializer.php
 *
 * @date        30/04/2014
 * @file        Initializer.php
 */

namespace Core\Mapper;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Initializer
 */
class Initializer implements InitializerInterface
{
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof MapperDoctrineAbstract) {
            $entityClassName = str_replace('Mapper', 'Entity', get_class($instance));

            if (class_exists($entityClassName) && !$instance->getEntityClassName()) {
                $instance->setEntityClassName($entityClassName);
            } else {
                throw new Exception('Entity ' . $entityClassName . " class doesn't exist");
            }
        }

        return $instance;
    }
} 