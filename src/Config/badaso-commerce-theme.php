<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Prefix
    |--------------------------------------------------------------------------
    |
    | This prefix will set the entry point of the badaso commerce theme.
    |
    */
    'theme_prefix' => env('MIX_COMMERCE_WEB_ROUTE_PREFIX', 'commerce'),

    /*
    |--------------------------------------------------------------------------
    | Override Controller
    |--------------------------------------------------------------------------
    |
    | Register a controller to override the default controller.
    |
    */
    'controllers' => [
        'api' => [],
        'web' => [],
    ],
];
