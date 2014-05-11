<?php
return [
    'modules'                 => [
        'Application',
        'Core',
        'DoctrineModule',
        'DoctrineORMModule',
    ],
    'module_listener_options' => [
        'config_glob_paths' => [
            './config/autoload/{,*.}{global,local}.php',
        ],
        'module_paths'      => [
            'module',
            'vendor',
        ]
    ],
    'service_manager'         => [
        'factories' => [],
    ],
];
