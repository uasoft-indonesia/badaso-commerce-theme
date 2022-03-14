<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class InertiaController extends Controller
{
    /**
     * General route.
     */
    public function home()
    {
        return Inertia::render('home', [
            'name' => 'Home',
        ], 'commerce-theme:app');
    }

    public function category()
    {
        return Inertia::render('category', [
            'slug'     => request('slug'),
            'name'     => 'Category',
            'sort'     => request('sort'),
            'search'   => request('search'),
            'rating'   => request('rating'),
            'minPrice' => request('minPrice'),
            'maxPrice' => request('maxPrice'),
            'type'     => request('type'),
        ], 'commerce-theme:app');
    }

    public function cart()
    {
        return Inertia::render('cart', [
            'name' => 'Cart',
        ], 'commerce-theme:app');
    }

    public function checkout()
    {
        return Inertia::render('checkout', [
            'name' => 'Checkout',
        ], 'commerce-theme:app');
    }

    public function detail($slug)
    {
        return Inertia::render('detail', [
            'slug' => $slug,
            'name' => 'Detail',
        ], 'commerce-theme:app');
    }

    public function productList()
    {
        return Inertia::render('product-list', [
            'name' => 'Product List',
        ], 'commerce-theme:app');
    }

    public function search()
    {
        return Inertia::render('search', [
            'keyword'  => request('keyword'),
            'name'     => 'Search',
            'sort'     => request('sort'),
            'search'   => request('search'),
            'rating'   => request('rating'),
            'minPrice' => request('minPrice'),
            'maxPrice' => request('maxPrice'),
            'type'     => request('type'),
        ], 'commerce-theme:app');
    }

    /**
     * Auth route.
     */
    public function authForgotPassword()
    {
        return Inertia::render('auth/forgot-password', [
            'name' => 'Forgot Password',
        ], 'commerce-theme:app');
    }

    public function authLogin()
    {
        return Inertia::render('auth/login', [
            'name' => 'Login',
        ], 'commerce-theme:app');
    }

    public function authRegister()
    {
        return Inertia::render('auth/register', [
            'name' => 'Register',
        ], 'commerce-theme:app');
    }

    public function authResetPassword($email, $token)
    {
        return Inertia::render('auth/reset-password', [
            'email' => $email,
            'token' => $token,
            'name'  => 'Reset Password',
        ], 'commerce-theme:app');
    }

    public function authVerify($email)
    {
        return Inertia::render('auth/verify', [
            'email' => $email,
            'name'  => 'Verify',
        ], 'commerce-theme:app');
    }

    /**
     * Profile route.
     */
    public function userProfile()
    {
        return Inertia::render('user/profile', [
            'name' => 'Profile',
        ], 'commerce-theme:app');
    }

    public function userAddress()
    {
        return Inertia::render('user/address', [
            'name' => 'Address',
        ], 'commerce-theme:app');
    }

    public function userAddressAdd()
    {
        return Inertia::render('user/address-add', [
            'name' => 'Add Address',
        ], 'commerce-theme:app');
    }

    public function userAddressEdit($id)
    {
        return Inertia::render('user/address-edit', [
            'id'   => $id,
            'name' => 'Edit Address',
        ], 'commerce-theme:app');
    }

    public function userNotification()
    {
        return Inertia::render('user/notification', [
            'name' => 'Notification',
        ], 'commerce-theme:app');
    }

    public function userOrderDetail($id)
    {
        return Inertia::render('user/order-detail', [
            'id'   => $id,
            'name' => 'Order Detail',
        ], 'commerce-theme:app');
    }

    public function userChangePassword()
    {
        return Inertia::render('user/change-password', [
            'name' => 'Change Password',
        ], 'commerce-theme:app');
    }

    public function userOrder()
    {
        return Inertia::render('user/order', [
            'name' => 'Order',
        ], 'commerce-theme:app');
    }

    /**
     * Legal route.
     */
    public function legalPrivacy()
    {
        return Inertia::render('legal/privacy', [
            'name' => 'Privacy',
        ], 'commerce-theme:app');
    }

    public function legalTos()
    {
        return Inertia::render('legal/tos', [
            'name' => 'Term of Service',
        ], 'commerce-theme:app');
    }

    /**
     * Payment route.
     */
    public function paymentInfo($id)
    {
        return Inertia::render('payment/info', [
            'name' => 'Payment Info',
            'id'   => $id,
        ], 'commerce-theme:app');
    }

    public function paymentConfirm($id)
    {
        return Inertia::render('payment/confirm', [
            'name' => 'Payment Confirmation',
            'id'   => $id,
        ], 'commerce-theme:app');
    }

    public function review($id)
    {
        return Inertia::render('user/review', [
            'name' => 'Review',
            'id'   => $id,
        ], 'commerce-theme:app');
    }

    public function HTTP404()
    {
        return Inertia::render('404', [
            'name' => '404',
        ], 'commerce-theme:app');
    }
}
