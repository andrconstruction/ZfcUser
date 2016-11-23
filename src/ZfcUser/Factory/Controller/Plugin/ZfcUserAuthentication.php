<?php

namespace ZfcUser\Factory\Controller\Plugin;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Controller;

class ZfcUserAuthentication implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceManager
     * @return mixed
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        $serviceLocator = $container;
        $authService = $serviceLocator->get('zfcuser_auth_service');
        $authAdapter = $serviceLocator->get('ZfcUser\Authentication\Adapter\AdapterChain');
        $controllerPlugin = new Controller\Plugin\ZfcUserAuthentication;
        $controllerPlugin->setAuthService($authService);
        $controllerPlugin->setAuthAdapter($authAdapter);
        return $controllerPlugin;
    }
}
