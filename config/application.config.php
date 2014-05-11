<?php
return [
    // This should be an array of module namespaces used in the application.
    'modules' => [
        'Application',
        'Core',
        'DoctrineModule',
        'DoctrineORMModule',
    ],

    // These are various options for the listeners attached to the ModuleManager
    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            'config/autoload/{,*.}{global,local}.php',
        ],
    ],
    'service_manager' => [
        'aliases' =>
            [
                'entity_manager' => 'Doctrine\ORM\EntityManager',
                'em'             => 'Doctrine\ORM\EntityManager',
            ]
    ],
];
