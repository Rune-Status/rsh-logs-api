<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => [
        'localhost:8080',
        'gpack.me',
    ],
    'allowedHeaders' => ['*'],
    'allowedMethods' => ['GET'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
