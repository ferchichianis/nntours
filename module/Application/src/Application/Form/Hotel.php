<?php
/**
 * Hotel.php
 *
 * @date        28/04/2014
 * @file        Hotel.php
 */

namespace Application\Form;

use Core\Form\FormAbstract;


/**
 * Hotel
 */
class Hotel extends FormAbstract
{
    /**
     * @var string $hydratorClass
     */
    protected $hydratorClass = 'DoctrineObject';

    /**
     * @var string $entityClass
     */
    protected $entityClass = 'Application\Entity\Hotel';

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
                'name' => 'category',
                'type' => 'ObjectSelect',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Catégorie',
                        'empty_option'    => '-- Choisir une catégorie --',
                        'target_class' => 'Application\Entity\Hotel\Category',
                        'property' => 'name',
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'phone',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Téléphone'
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'fax',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Fax'
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
                        'label' => 'Pays',
                        'empty_option'    => '-- Choisir une ville --',
                        'target_class' => 'Application\Entity\City',
                        'property' => 'name',
                    ]
            ]
        );
    }
} 