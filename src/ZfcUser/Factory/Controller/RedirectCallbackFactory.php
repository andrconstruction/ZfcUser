<?php
/**
 * Created by PhpStorm.
 * User: Clayton Daley
 * Date: 5/6/2015
 * Time: 6:37 PM
 */

namespace ZfcUser\Factory\Controller;


use Zend\Mvc\Application;
use Zend\Mvc\Router\RouteInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Controller\RedirectCallback;
use ZfcUser\Options\ModuleOptions;

class RedirectCallbackFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        /* @var RouteInterface $router */
        $router = $container->get('Router');

        /* @var Application $application */
        $application = $container->get('Application');

        /* @var ModuleOptions $options */
        $options = $container->get('zfcuser_module_options');

        return new RedirectCallback($application, $router, $options);
    }
}
