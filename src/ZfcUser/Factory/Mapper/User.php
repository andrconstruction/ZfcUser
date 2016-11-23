<?php

namespace ZfcUser\Factory\Mapper;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Mapper;

class User implements FactoryInterface
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
        $options = $container->get('zfcuser_module_options');
        $mapper = new Mapper\User();
        $mapper->setDbAdapter($container->get('zfcuser_zend_db_adapter'));
        $entityClass = $options->getUserEntityClass();
        $mapper->setEntityPrototype(new $entityClass);
        $mapper->setHydrator(new Mapper\UserHydrator());
        $mapper->setTableName($options->getTableName());
        return $mapper;
    }
}
