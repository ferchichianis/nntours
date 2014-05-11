<?php
/**
 * AbstractServiceFactory.php
 *
 * @date        29/04/2014
 * @file        AbstractServiceFactory.php
 */

namespace Core\Mapper;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\AbstractFactoryAbstract;

/**
 * AbstractServiceFactory
 */
class AbstractMapperFactory extends AbstractFactoryAbstract implements AbstractFactoryInterface
{
    /** @var string $classType */
    protected $factoryType = 'mapper';
}