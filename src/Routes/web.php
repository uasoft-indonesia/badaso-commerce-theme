<?php

use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Theme\CommerceTheme\Middlewares\HandleInertiaRequests;

$commerce_route_prefix = config('badaso-commerce-theme.theme_prefix');
Route::prefix($commerce_route_prefix)
    ->as('badaso.commerce-theme.')
    ->namespace('Uasoft\Badaso\Theme\CommerceTheme\Controllers\Web')
    ->middleware(['web', HandleInertiaRequests::class])
    ->group(function () {

        /**
         * General route
         */
        Route::get('/', 'InertiaController@home')->name('home');
        Route::get('/category/{slug}', 'InertiaController@category')->name('category');
        Route::get('/cart', 'InertiaController@cart')->name('cart');
        Route::get('/checkout', 'InertiaController@checkout')->name('checkout');
        Route::get('/detail/{slug}', 'InertiaController@detail')->name('detail');
        Route::get('/list', 'InertiaController@productList')->name('product-list');
        Route::get('/search/{search}', 'InertiaController@search')->name('search');

        /**
         * Auth route
         */
        Route::get('/auth/login', 'InertiaController@authLogin')->name('login');
        Route::get('/auth/register', 'InertiaController@authRegister')->name('register');
        Route::get('/auth/reset-password/{email}/{token}', 'InertiaController@authResetPassword')->name('reset-password');
        Route::get('/auth/forgot-password/{email?}', 'InertiaController@authForgotPassword')->name('forgot-password');
        Route::get('/auth/verify/{email}', 'InertiaController@authVerify')->name('verification');

        /**
         * My profile route
         */
        Route::get('/profile', 'InertiaController@userProfile')->name('profile');
        Route::get('/profile/notification', 'InertiaController@userNotification')->name('notification');
        Route::get('/profile/address', 'InertiaController@userAddress')->name('address');
        Route::get('/profile/password/change', 'InertiaController@userChangePassword')->name('change-password');
        Route::get('/profile/order', 'InertiaController@userOrder')->name('order');
        Route::get('/profile/order/{id}', 'InertiaController@userOrderDetail')->name('order-detail');
        Route::get('/profile/address/add', 'InertiaController@userAddressAdd')->name('address-add');
        Route::get('/profile/address/edit/{id}', 'InertiaController@userAddressEdit')->name('address-edit');

        /**
         * Legal route
         */
        Route::get('/legal/tos', 'InertiaController@legalTos')->name('tos');
        Route::get('/legal/privacy', 'InertiaController@legalPrivacy')->name('privacy');

        /**
         * Payment route
         */
        Route::get('/payment/{id}/info', 'InertiaController@paymentInfo')->name('payment-info');
        Route::get('/payment/{id}/confirm', 'InertiaController@paymentConfirm')->name('payment-confirm');
        Route::get('/review/{id}', 'InertiaController@review')->name('review');

        Route::fallback('InertiaController@HTTP404');
    });