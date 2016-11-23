<?php

namespace ZfcUser\Factory\View\Helper;

use Zend\ServiceManager\Factory\FactoryInterface;
use ZfcUser\View;
use Interop\Container\ContainerInterface;


class ZfcUserDisplayName implements FactoryInterface
{

    public function __invoke(
        ContainerInterface $container,
        $requestedName,
        array $options = null
    ){
        $viewHelper = new View\Helper\ZfcUserDisplayName;
        /* @todo inject via constructor */
        $viewHelper->setAuthService($container->get('zfcuser_auth_service'));
        return $viewHelper;
    }
}
