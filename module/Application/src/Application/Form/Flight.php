<?php
/**
 * Flight.php
 *
 * @date        28/04/2014
 * @file        Flight.php
 */

namespace Application\Form;

use Core\Form\FormAbstract;


/**
 * Flight
 */
class Flight extends FormAbstract
{
    /**
     * @var string $hydratorClass
     */
    protected $hydratorClass = 'DoctrineObject';

    /**
     * @var string $entityClass
     */
    protected $entityClass = 'Application\Entity\Flight';

    public function init()
    {
        $this->add(
            [
                'name' => 'reference',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Réference'
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'departure',
                'type' => 'ObjectSelect',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Départ',
                        'empty_option'    => '-- Choisir un départ --',
                        'target_class' => 'Application\Entity\Airport',
                        'property' => 'name',
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'arrival',
                'type' => 'ObjectSelect',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Destination',
                        'empty_option'    => '-- Choisir une destination --',
                        'target_class' => 'Application\Entity\Airport',
                        'property' => 'name',
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'datetime',
                'type' => 'date',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Horaire'
                    ]
            ]
        );
    }
} 