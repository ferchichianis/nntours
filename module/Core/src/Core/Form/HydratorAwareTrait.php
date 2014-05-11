<?php
/**
 * HydratorAwareTrait.php
 *
 * @date        29/04/2014
 * @file        HydratorAwareTrait.php
 */

namespace Core\Form;

/**
 * HydratorAwareTrait
 */
trait HydratorAwareTrait
{

    /**
     * @return string
     */
    public function getHydratorClass()
    {
        return $this->hydratorClass;
    }

} 