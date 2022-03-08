<?php

use Illuminate\Support\Facades\Route;
use Uasoft\Badaso\Theme\CommerceTheme\Helpers\Route as HelpersRoute;
use Uasoft\Badaso\Theme\CommerceTheme\Middlewares\HandleInertiaRequests;

$commerce_route_prefix = config('badaso-commerce-theme.theme_prefix');
Route::prefix($commerce_route_prefix)
    ->as('badaso.commerce-theme.')
    ->middleware(['web', HandleInertiaRequests::class])
    ->group(function () {

        /**
         * General route.
         */
        Route::get('/', HelpersRoute::getController('InertiaController@home'))->name('home');
        Route::get('/category/{slug}', HelpersRoute::getController('InertiaController@category'))->name('category');
        Route::get('/cart', HelpersRoute::getController('InertiaController@cart'))->name('cart');
        Route::get('/checkout', HelpersRoute::getController('InertiaController@checkout'))->name('checkout');
        Route::get('/detail/{slug}', HelpersRoute::getController('InertiaController@detail'))->name('detail');
        Route::get('/list', HelpersRoute::getController('InertiaController@productList'))->name('product-list');
        Route::get('/search', HelpersRoute::getController('InertiaController@search'))->name('search');

        /**
         * Auth route.
         */
        Route::get('/auth/login', HelpersRoute::getController('InertiaController@authLogin'))->name('login');
        Route::get('/auth/register', HelpersRoute::getController('InertiaController@authRegister'))->name('register');
        Route::get('/auth/reset-password/{email}/{token}', HelpersRoute::getController('InertiaController@authResetPassword'))->name('reset-password');
        Route::get('/auth/forgot-password/{email?}', HelpersRoute::getController('InertiaController@authForgotPassword'))->name('forgot-password');
        Route::get('/auth/verify/{email}', HelpersRoute::getController('InertiaController@authVerify'))->name('verification');

        /**
         * My profile route.
         */
        Route::get('/profile', HelpersRoute::getController('InertiaController@userProfile'))->name('profile');
        Route::get('/profile/notification', HelpersRoute::getController('InertiaController@userNotification'))->name('notification');
        Route::get('/profile/address', HelpersRoute::getController('InertiaController@userAddress'))->name('address');
        Route::get('/profile/password/change', HelpersRoute::getController('InertiaController@userChangePassword'))->name('change-password');
        Route::get('/profile/order', HelpersRoute::getController('InertiaController@userOrder'))->name('order');
        Route::get('/profile/order/{id}', HelpersRoute::getController('InertiaController@userOrderDetail'))->name('order-detail');
        Route::get('/profile/address/add', HelpersRoute::getController('InertiaController@userAddressAdd'))->name('address-add');
        Route::get('/profile/address/edit/{id}', HelpersRoute::getController('InertiaController@userAddressEdit'))->name('address-edit');

        /**
         * Legal route.
         */
        Route::get('/legal/tos', HelpersRoute::getController('InertiaController@legalTos'))->name('tos');
        Route::get('/legal/privacy', HelpersRoute::getController('InertiaController@legalPrivacy'))->name('privacy');

        /**
         * Payment route.
         */
        Route::get('/payment/{id}/info', HelpersRoute::getController('InertiaController@paymentInfo'))->name('payment-info');
        Route::get('/payment/{id}/confirm', HelpersRoute::getController('InertiaController@paymentConfirm'))->name('payment-confirm');
        Route::get('/review/{id}', HelpersRoute::getController('InertiaController@review'))->name('review');

        Route::fallback(HelpersRoute::getController('InertiaController@HTTP404'));
    });
