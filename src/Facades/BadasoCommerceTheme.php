<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Facades;

use Illuminate\Support\Facades\Facade;

class BadasoCommerceTheme extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'badaso-commerce-theme';
    }
}
