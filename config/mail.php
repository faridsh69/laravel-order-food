<?php

return [

    'driver' => env('MAIL_DRIVER', 'smtp'),
    
    'host' => env('MAIL_HOST', 'smtp.gmail.com'),

    'port' => env('MAIL_PORT', 587),

    'from' => [
        'address' => 'farid.sharifi69@gmail.com',
        'name' => 'ali',
    ],

    'encryption' => env('MAIL_ENCRYPTION', 'tls'),

    'username' => env('MAIL_USERNAME', 'farid.sharifi69@gmail.com'),

    'password' => env('MAIL_PASSWORD', 'farid111'),

    'sendmail' => '/usr/sbin/sendmail -bs',
    
    'pretend' => false,

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
