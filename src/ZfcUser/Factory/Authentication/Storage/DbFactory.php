<?php

namespace ZfcUser\Factory\Authentication\Storage;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Authentication\Storage\Db;

class DbFactory implements FactoryInterface
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
        $db = new Db();
        $db->setServiceManager($container);
        return $db;
    }
}
