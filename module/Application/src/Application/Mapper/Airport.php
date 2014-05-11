<?php
/**
 * Airport.php
 *
 * @date        29/04/2014
 * @file        Airport.php
 */

namespace Application\Mapper;

use Core\Mapper\MapperDoctrineAbstract;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Airport
 */
class Airport extends MapperDoctrineAbstract
{
    public function find($id)
    {
        return $this->getEntityRepository()->find($id);
    }

    public function findAll(){
        return $this->getEntityRepository()->findAll();
    }
}