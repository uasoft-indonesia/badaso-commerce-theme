<?php

use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Middleware\ApiRequest;
use Uasoft\Badaso\Middleware\BadasoAuthenticate;
use Uasoft\Badaso\Middleware\BadasoCheckPermissions;
use Uasoft\Badaso\Theme\CommerceTheme\Helpers\Route as HelpersRoute;

$api_route_prefix = \config('badaso.api_route_prefix');

Route::group(['prefix' => $api_route_prefix, 'as' => 'badaso.', 'middleware' => [ApiRequest::class]], function () {
    Route::group(['prefix' => 'theme/commerce-theme/v1'], function () {
        Route::group(['prefix' => 'configurations', 'middleware' => [BadasoAuthenticate::class]], function () {
            Route::put('/edit', HelpersRoute::getApiController('ConfigurationController@edit'))->middleware(BadasoCheckPermissions::class.':edit_configurations');
            Route::put('/edit-multiple', HelpersRoute::getApiController('ConfigurationController@editMultiple'))->middleware(BadasoCheckPermissions::class.':edit_configurations');
            Route::post('/add', HelpersRoute::getApiController('ConfigurationController@add'))->middleware(BadasoCheckPermissions::class.':add_configurations');
            Route::delete('/delete', HelpersRoute::getApiController('ConfigurationController@delete'))->middleware(BadasoCheckPermissions::class.':delete_configurations');
        });

        Route::group(['prefix' => 'configurations'], function () {
            Route::get('/', HelpersRoute::getApiController('ConfigurationController@browse'));
            Route::get('/read', HelpersRoute::getApiController('ConfigurationController@read'));
        });
    });
});