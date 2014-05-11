<?php
/**
 * AbstractFactoryAbstract.php
 *
 * @date        30/04/2014
 * @file        AbstractFactoryAbstract.php
 */

namespace Core;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Filter\StaticFilter;

/**
 * AbstractFactoryAbstract
 */
class AbstractFactoryAbstract
{
    /** @var string $classType */
    protected $factoryType = null;

    /**
     * @return string
     */
    public function getFactoryType()
    {
        return $this->factoryType;
    }

    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param                         $name
     * @param                         $requestedName
     *
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $explodedName = explode('.', $requestedName);

        if(isset($explodedName[1])) {
            return $explodedName[1] === $this->getFactoryType();
        }
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param                         $name
     * @param                         $requestedName
     *
     * @throws \Exception
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $explodedName = explode('.', $requestedName);

        $className = '';
        foreach ($explodedName as $nameSpace) {
            $className .= '\\' . \ucfirst(StaticFilter::execute($nameSpace, 'Word\DashToCamelCase'));
        }

        if (class_exists($className)) {
            return new $className;
        }

        throw new Exception('No service available for class name ' . (string)$className);
    }
} 