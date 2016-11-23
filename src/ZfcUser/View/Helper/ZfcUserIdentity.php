<?php

namespace ZfcUser\View\Helper;

use Zend\View\Helper\AbstractHelper;
use Zend\Authentication\AuthenticationService;
use Interop\Container\ContainerInterface;

class ZfcUserIdentity extends AbstractHelper
{
    /**
     * @var AuthenticationService
     */
    protected $authService;
    
    public function __construct(
        AuthenticationService $zfcuserAuthService
    ){
        $this->authService = $zfcuserAuthService;
    }

    public function __invoke(
        
    ){
        if ($this->authService->hasIdentity()) {
            return $this->authService->getIdentity();
        } else {
            return false;
        }
    }

}
