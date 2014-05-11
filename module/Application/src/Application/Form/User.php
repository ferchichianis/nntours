<?php
/**
 * User.php
 *
 * @date        28/04/2014
 * @file        User.php
 */

namespace Application\Form;

use Core\Form\FormAbstract;


/**
 * User
 */
class User extends FormAbstract
{
    /**
     * @var string $hydratorClass
     */
    protected $hydratorClass = 'DoctrineObject';

    /**
     * @var string $entityClass
     */
    protected $entityClass = 'Application\Entity\User';

    public function init()
    {
        $this->add(
            [
                'name' => 'firstName',
                'type' => 'text',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Prénom'
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'lastName',
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
                'name' => 'email',
                'type' => 'email',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Email'
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
                'name' => 'country',
                'type' => 'ObjectSelect',
                'required' => true,
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Pays',
                        'empty_option'    => '-- Choisir un pays --',
                        'target_class' => 'Application\Entity\Country',
                        'property' => 'name',
                    ]
            ]
        );

        $this->add(
            [
                'name' => 'birthDate',
                'type' => 'date',
                'attributes' => ['class' => 'form-control'],
                'options' =>
                    [
                        'label' => 'Né(e) le'
                    ]
            ]
        );
    }
} 