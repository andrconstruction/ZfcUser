<?php

namespace ZfcUser\Factory\Options;


use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\Options;

class ModuleOptions implements FactoryInterface
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
        $config = $container->get('Config');
        return new Options\ModuleOptions(isset($config['zfcuser']) ? $config['zfcuser'] : array());
    }
}
