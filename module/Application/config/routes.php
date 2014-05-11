<?php
/**
 * routes.php
 *
 * @date        28/04/2014
 * @file        routes.php
 */

return
    [
        'routes' => [
            'home' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/',
                    'defaults' => [
                        'controller' => 'Application\Index',
                        'action' => 'index',
                    ],
                ],
            ],
            'crud' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/crud[/:entity[/:action[/:id]]]',
                    'constraints' => [
                        'action' => '[a-z]+',
                        'entity' => '[a-z]+',
                        'id' => '\d+',
                    ],
                    'defaults' => [
                        'controller' => 'Application\Crud',
                        'id' => null,
                        'action' => 'list',
                        'entity' => 'user'
                    ]
                ],
            ],
        ],
    ];