<?php
/**
 * AbstractServiceFactory.php
 *
 * @date        29/04/2014
 * @file        AbstractServiceFactory.php
 */

namespace Core\Service;

use Core\AbstractFactoryAbstract;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * AbstractServiceFactory
 */
class AbstractServiceFactory extends AbstractFactoryAbstract implements AbstractFactoryInterface
{
    /** @var string $classType */
    protected $factoryType = 'service';
}