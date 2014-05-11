<?php
/**
 * mdule.config.php
 *
 * @date        28/04/2014
 * @file        mdule.config.php
 */

return [
    'service_manager' =>
        [
            'abstract_factories' =>
                [
                    'Core\Form\AbstractFormFactory',
                    'Core\Service\AbstractServiceFactory',
                    'Core\Mapper\AbstractMapperFactory',
                ],
            'initializers' =>
                [
                    'Core\Mapper\Initializer'
                ],
        ],

    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'phparray',
                'base_dir' => getcwd() . '/vendor/zendframework/zendframework/resources/languages/',
                'pattern' => '%.2s/Zend_Validate.php',
            ],
            [
                'type' => 'phparray',
                'base_dir' => getcwd() . '/vendor/zendframework/zendframework/resources/languages/',
                'pattern' => '%.2s/Zend_Captcha.php',
            ],
        ],

    ],

    'form_elements' =>
        [
            'initializers' =>
                [
                    'Core\Form\Initializer'
                ]
        ]
];