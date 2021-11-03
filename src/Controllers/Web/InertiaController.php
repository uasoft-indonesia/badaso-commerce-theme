<?php

namespace Uasoft\Badaso\Theme\CommerceTheme\Controllers\Web;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class InertiaController extends Controller
{
    /**
     * General route
     */
    public function home()
    {
        return Inertia::render('home', [], 'commerce-theme:app');
    }

    public function category($slug)
    {
        return Inertia::render('category', [
            'slug' => $slug
        ], 'commerce-theme:app');
    }

    public function cart()
    {
        return Inertia::render('cart', [], 'commerce-theme:app');
    }

    public function checkout()
    {
        return Inertia::render('checkout', [], 'commerce-theme:app');
    }

    public function detail($slug)
    {
        return Inertia::render('detail', [
            'slug' => $slug
        ], 'commerce-theme:app');
    }

    public function productList()
    {
        return Inertia::render('product-list', [], 'commerce-theme:app');
    }

    public function search($search)
    {
        return Inertia::render('search', [
            'search' => $search
        ], 'commerce-theme:app');
    }

    public function topSelling()
    {
        return Inertia::render('top-selling', [], 'commerce-theme:app');
    }

    /**
     * Auth route
     */
    public function authForgotPassword()
    {
        return Inertia::render('auth/forgot-password', [], 'commerce-theme:app');
    }

    public function authLogin()
    {
        return Inertia::render('auth/login', [
            'name' => 'Log In'
        ], 'commerce-theme:app');
    }

    public function authRegister()
    {
        return Inertia::render('auth/register', [], 'commerce-theme:app');
    }

    public function authResetPassword($email, $token)
    {
        return Inertia::render('auth/reset-password', [
            'email' => $email,
            'token' => $token,
        ], 'commerce-theme:app');
    }

    public function authVerify($email)
    {
        return Inertia::render('auth/verify', [
            'email' => $email
        ], 'commerce-theme:app');
    }

    /**
     * Profile route
     */
    public function userProfile()
    {
        return Inertia::render('user/profile', [], 'commerce-theme:app');
    }

    public function userAddress()
    {
        return Inertia::render('user/address', [], 'commerce-theme:app');
    }

    public function userAddressAdd()
    {
        return Inertia::render('user/address-add', [], 'commerce-theme:app');
    }

    public function userAddressEdit($id)
    {
        return Inertia::render('user/address-edit', [
            'id' => $id
        ], 'commerce-theme:app');
    }

    public function userNotification()
    {
        return Inertia::render('user/notification', [], 'commerce-theme:app');
    }

    public function userOrderDetail($id)
    {
        return Inertia::render('user/order-detail', [
            'id' => $id
        ], 'commerce-theme:app');
    }

    public function userChangePassword()
    {
        return Inertia::render('user/change-password', [], 'commerce-theme:app');
    }

    public function userOrder()
    {
        return Inertia::render('user/order', [], 'commerce-theme:app');
    }

    /**
     * Legal route
     */
    public function legalPrivacy()
    {
        return Inertia::render('legal/privacy', [], 'commerce-theme:app');
    }

    public function legalTos()
    {
        return Inertia::render('legal/tos', [], 'commerce-theme:app');
    }
}