<?php
/**
 * Created by PhpStorm.
 * User: anis
 * Date: 08/05/14
 * Time: 18:47
 */

namespace Core\Form;

use Zend\Form\Form;

use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;

use Core\Form\EntityAwareInterface;
use Core\Form\EntityAwareTrait;
use Core\Form\HydratorAwareInterface;
use Core\Form\HydratorAwareTrait;

abstract class FormAbstract extends Form implements HydratorAwareInterface,
                                                    EntityAwareInterface,
                                                    ObjectManagerAwareInterface
{
    protected $hydratorClass = null;
    protected $entityClass = null;

    use HydratorAwareTrait;
    use EntityAwareTrait;
    use ProvidesObjectManager;
} 