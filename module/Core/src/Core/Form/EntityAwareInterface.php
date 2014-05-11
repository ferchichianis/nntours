<?php
/**
 * EntityAwareInterface.php
 *
 * @date        29/04/2014
 * @file        EntityAwareInterface.php
 */

namespace Core\Form;
use Zend\Form\FieldsetInterface;

/**
 * EntityAwareInterface
 */
interface EntityAwareInterface extends FieldsetInterface
{

    /**
     * Get the entity class name
     *
     * @return string
     */
    public function getEntityClass();

} 