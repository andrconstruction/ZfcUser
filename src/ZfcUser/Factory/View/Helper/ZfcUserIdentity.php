<?php

namespace ZfcUser\Factory\View\Helper;

use Zend\ServiceManager\Factory\FactoryInterface;
use ZfcUser\View;
use Interop\Container\ContainerInterface;

class ZfcUserIdentity implements FactoryInterface
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
        return new View\Helper\ZfcUserIdentity(
            $container->get('zfcuser_auth_service')
        );
    }
}
