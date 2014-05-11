<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return [
    'doctrine' => array(
        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Application\Entity\User',
                'identity_property' => 'email',
                'credential_property' => 'password',
            ),
        ),
    ),
    'controllers' => [
        'invokables' => [
            'Application\Index' => 'Application\Controller\IndexController',
            'Application\User'  => 'Application\Controller\UserController',
            'Application\Crud'  => 'Application\Controller\CrudController',
            'Application\Hotel' => 'Application\Controller\HotelController',
            'Application\Auth' => 'Application\Controller\AuthController'
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml'
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    // Placeholder for console routes
    'console' => [
        'router' => [
            'routes' => [
            ],
        ],
    ],
    'form_elements' =>
    [
        'invokables' =>
        [
            'form.user.set' => 'Application\Form\User',
            'form.hotel.set' => 'Application\Form\Hotel',
            'form.flight.set' => 'Application\Form\Flight',
            'form.airport.set' => 'Application\Form\Airport'
        ]
    ],
    'navigation' => [
        'default' => [
            ['route' => 'home', 'label' => 'Acceuil'],
            ['route' => 'crud', 'label' => 'Hôtels', 'params ' => ['entity' => 'hotel']],
            ['route' => 'crud', 'label' => 'Vols', 'params ' => ['entity' => 'flight']],
            ['route' => 'crud', 'label' => 'Utilisateurs', 'params ' => ['entity' => 'user']],
            ['route' => 'crud', 'label' => 'Aéroports', 'params ' => ['entity' => 'airport']]
        ],
    ]
];
