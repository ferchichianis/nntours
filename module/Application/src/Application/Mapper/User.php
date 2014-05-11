<?php
/**
 * User.php
 *
 * @date        29/04/2014
 * @file        User.php
 */

namespace Application\Mapper;

use Core\Mapper\MapperDoctrineAbstract;

/**
 * User
 */
class User extends MapperDoctrineAbstract
{
    public function find($id)
    {
        return $this->getEntityRepository()->find($id);
    }

    public function findAll(){
        return $this->getEntityRepository()->findAll();
    }

}