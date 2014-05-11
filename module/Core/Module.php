<?php
/**
 * Module.php
 *
 * @date        28/04/2014
 * @file        Module.php
 */

namespace Core;

use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleEvent;
use Zend\ModuleManager\ModuleManagerInterface;

/**
 * Module
 */
class Module implements InitProviderInterface
{

    public function init(ModuleManagerInterface $manager)
    {
        $eventManager = $manager->getEventManager();
        $eventManager->attach(ModuleEvent::EVENT_LOAD_MODULES_POST, [$this, 'initPhpSettings']);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    'Core' => __DIR__ . '/src/Core',
                ),
            ),
        );
    }

    /**
     * @param ModuleEvent $event
     */
    public function initPhpSettings(ModuleEvent $event)
    {
        $config = $event->getParam('ServiceManager')->get('config');

        if (isset($config['phpSettings'])) {
            foreach ($config['phpSettings'] as $key => $value) {
                ini_set($key, $value);
            }
        }
    }

} 