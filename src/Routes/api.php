<?php

use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Middleware\ApiRequest;
use Uasoft\Badaso\Middleware\BadasoAuthenticate;
use Uasoft\Badaso\Middleware\BadasoCheckPermissions;

$api_route_prefix = \config('badaso.api_route_prefix');

Route::group(['prefix' => $api_route_prefix, 'namespace' => 'Uasoft\Badaso\Theme\CommerceTheme\Controllers', 'as' => 'badaso.', 'middleware' => [ApiRequest::class]], function () {
    Route::group(['prefix' => 'theme/commerce-theme/v1'], function () {
        Route::group(['prefix' => 'configurations', 'middleware' => [BadasoAuthenticate::class]], function () {
            Route::put('/edit', 'ConfigurationController@edit')->middleware(BadasoCheckPermissions::class.':edit_configurations');
            Route::put('/edit-multiple', 'ConfigurationController@editMultiple')->middleware(BadasoCheckPermissions::class.':edit_configurations');
            Route::post('/add', 'ConfigurationController@add')->middleware(BadasoCheckPermissions::class.':add_configurations');
            Route::delete('/delete', 'ConfigurationController@delete')->middleware(BadasoCheckPermissions::class.':delete_configurations');
        });

        Route::group(['prefix' => 'configurations'], function () {
            Route::get('/', 'ConfigurationController@browse');
            Route::get('/read', 'ConfigurationController@read');
        });
    });
});