<?php
/**
 * services.php
 *
 * @date        29/04/2014
 * @file        services.php
 */

return [
    'abstract_factories' =>
        [
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ],
    'aliases' =>
        [
            'translator' => 'MvcTranslator',
        ],
    'invokables' =>
        [
        ],
    'factories' => [
        'navigation' => 'Zend\Navigation\Service\DefaultNavigationFactory'
    ]
];