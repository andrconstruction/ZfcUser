<?php


namespace ZfcUser\Factory;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

class AuthenticationService implements FactoryInterface
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
        return new \Zend\Authentication\AuthenticationService(
            $container->get('ZfcUser\Authentication\Storage\Db'),
            $container->get('ZfcUser\Authentication\Adapter\AdapterChain')
        );
    }
}
