<?php
/**
 * Hotel.php
 *
 * @date        29/04/2014
 * @file        Hotel.php
 */

namespace Application\Mapper;

use Core\Mapper\MapperDoctrineAbstract;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

/**
 * Hotel
 */
class Hotel extends MapperDoctrineAbstract
{
    public function find($id)
    {
        return $this->getEntityRepository()->find($id);
    }

    public function findAll(){
        return $this->getEntityRepository()->findAll();
    }

}