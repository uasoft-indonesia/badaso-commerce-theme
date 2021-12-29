<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Helpers;

class Route
{
    public static function getController($key)
    {
        // get config 'controllers' from config/badaso-commerce.php
        $controllers = config('badaso-commerce-theme.controllers.web');

        // if the key is not found, return $key
        if (!isset($controllers[$key])) {
            return 'Uasoft\\Badaso\\Theme\\CommerceTheme\\Controllers\\Web\\' . $key;
        }

        // return the value of the key
        return $controllers[$key];
    }

    public static function getApiController($key)
    {
        // get config 'controllers' from config/badaso-commerce.php
        $controllers = config('badaso-commerce-theme.controllers.api');

        // if the key is not found, return $key
        if (!isset($controllers[$key])) {
            return 'Uasoft\\Badaso\\Theme\\CommerceTheme\\Controllers\\' . $key;
        }

        // return the value of the key
        return $controllers[$key];
    }
}