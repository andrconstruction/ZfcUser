<?php

namespace ZfcUser\Factory\View\Helper;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use ZfcUser\View;

class ZfcUserLoginWidget implements FactoryInterface
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
        $locator = $container;
        $viewHelper = new View\Helper\ZfcUserLoginWidget;
        $viewHelper->setViewTemplate($locator->get('zfcuser_module_options')->getUserLoginWidgetViewTemplate());
        $viewHelper->setLoginForm($locator->get('zfcuser_login_form'));
        return $viewHelper;
    }
}
