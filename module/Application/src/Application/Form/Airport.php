<?php
/**
 * Flight.php
 *
 * @date        28/04/2014
 * @file        Airport.php
 */

namespace Application\Form;

use Core\Form\FormAbstract;


/**
 * Airport
 */
class Airport extends FormAbstract
{
    /**
     * @var string $hydratorClass
     */
    protected $hydratorClass = 'DoctrineObject';

    /**
     * @var string $entityClass
     */
    protected $entityClass = 'Application\Entity\Airport';

    public function init()
    {
        $this->add(
            [
                'name' => 'name',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Nom'
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'code3',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control', 'maxlength' => 3, 'minlength' => 3],
                'options' =>
                    [
                        'label' => 'Trigramme'
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'city',
                'type' => 'ObjectSelect',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Destination',
                        'empty_option'    => '-- Choisir une ville --',
                        'target_class' => 'Application\Entity\City',
                        'property' => 'name',
                    ]
            ]
        );
    }
} 