<?php

namespace ZfcUser\Factory\Service;

use Zend\ServiceManager\Factory\FactoryInterface;
use ZfcUser\Service\User;
use Interop\Container\ContainerInterface;


class UserFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ContainerInterface $container
     * @return mixed
     */
    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        $service = new User();
        $service->setServiceManager($container);
        return $service;
    }
}
