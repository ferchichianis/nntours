<?php
/**
 * AbstractFormFactory.php
 *
 * @date        29/04/2014
 * @file        AbstractFormFactory.php
 */

namespace Core\Form;

use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Core\AbstractFactoryAbstract;

/**
 * AbstractServiceFactory
 */
class AbstractFormFactory extends AbstractFactoryAbstract implements AbstractFactoryInterface
{
    /** @var string $classType */
    protected $factoryType = 'form';
}