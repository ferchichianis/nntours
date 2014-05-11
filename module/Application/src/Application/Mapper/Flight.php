<?php
/**
 * Flight.php
 *
 * @date        29/04/2014
 * @file        Flight.php
 */

namespace Application\Mapper;

use Core\Mapper\MapperDoctrineAbstract;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Flight
 */
class Flight extends MapperDoctrineAbstract
{
    public function find($id)
    {
        return $this->getEntityRepository()->find($id);
    }

    public function findAll(){
        return $this->getEntityRepository()->findAll();
    }

}