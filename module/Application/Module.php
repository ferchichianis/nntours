<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

/**
 * Class Module
 * @package Application
 */
class Module
{
    /**
     * @param MvcEvent $e
     */
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $eventManager->attach(MvcEvent::EVENT_RENDER, array($this, 'onRender'), 1);
    }

    /**
     * @param MvcEvent $e
     */
    public function onRender(MvcEvent $e)
    {
        $menuItems = [
            ['url' => 'home', 'params' => [], 'text' => 'Acceuil', 'class' => null],
            ['url' => 'crud', 'params' => ['action' => 'list', 'entity' => 'hotel'], 'text' => 'Hôtels', 'class' => null],
            ['url' => 'crud', 'params' => ['action' => 'list', 'entity' => 'flight'], 'text' => 'Vols', 'class' => null],
            ['url' => 'crud', 'params' => ['action' => 'list', 'entity' => 'user'], 'text' => 'Utilisateurs', 'class' => null],
            ['url' => 'crud', 'params' => ['action' => 'list', 'entity' => 'airport'], 'text' => 'Aéroports', 'class' => null],
        ];
        $e->getViewModel()->setVariable('menuItems', $menuItems);
    }
    /**
     * @return array
     */
    public function getConfig()
    {
        $common = include __DIR__ . '/config/common.php';

        return $common + [
            'router' => include __DIR__ . '/config/routes.php',
            'service_manager' => include __DIR__ . '/config/services.php',
        ];
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function($serviceManager) {
                    // If you are using DoctrineORMModule:
                    return $serviceManager->get('doctrine.authenticationservice.orm_default');

                    // If you are using DoctrineODMModule:
                    return $serviceManager->get('doctrine.authenticationservice.odm_default');
                }
            )
        );
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
