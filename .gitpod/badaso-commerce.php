<?php

return [
    /*
     * This array of class will be registered as payment gateway
     * to the commerce module when this application is started.
     */
    'payments' => ['Uasoft\Badaso\Module\Commerce\BadasoCommerceModule'],
    /**
     * Override the controllers
     */
    'controllers' => [],
];
