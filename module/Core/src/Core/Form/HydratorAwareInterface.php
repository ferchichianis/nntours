<?php
/**
 * HydratorAwareInterface.php
 *
 * @date        29/04/2014
 * @file        HydratorAwareInterface.php
 */

namespace Core\Form;

use Zend\Stdlib\Hydrator\HydratorInterface;

interface HydratorAwareInterface
{
    /**
     * @return string
     */
    public function getHydratorClass();


    /**
     * @param $hydrator
     *
     * @return mixed
     */
    public function setHydrator(HydratorInterface $hydrator);

} 