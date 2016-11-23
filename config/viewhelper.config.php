<?php 
return [
    'factories' => [
        'zfcUserDisplayName' => function ($container){
            return new ZfcUser\Factory\View\Helper\ZfcUserDisplayName($container);
        },
        'zfcUserIdentity' => function ($container){
            return new ZfcUser\Factory\View\Helper\ZfcUserIdentity($container);
        },
        'zfcUserLoginWidget' => function ($container){
            return new ZfcUser\Factory\View\Helper\ZfcUserLoginWidget($container);
        },
    ]
];