import Home from '../pages/home.vue';
import Category from '../pages/category.vue';
import Search from '../pages/search.vue';
import DetailProduct from '../pages/detail.vue';
import ProductList from '../pages/product-list.vue';
import Cart from '../pages/cart.vue';
import Checkout from '../pages/checkout.vue';

import Profile from '../pages/user/profile.vue';
import Address from '../pages/user/address.vue';
import AddAddress from '../pages/user/address-add.vue';
import EditAddress from '../pages/user/address-edit.vue';
import ChangePassword from '../pages/user/change-password.vue';
import Order from '../pages/user/order.vue';
import OrderDetail from '../pages/user/order-detail.vue';
import Review from '../pages/user/review.vue';
import Notification from '../pages/user/notification.vue';

import Login from '../pages/auth/login.vue';
import Register from '../pages/auth/register.vue';
import ForgotPassword from '../pages/auth/forgot-password.vue';
import ResetPassword from '../pages/auth/reset-password.vue';
import Verification from '../pages/auth/verify.vue';

import TOS from '../pages/legal/tos.vue';
import Privacy from '../pages/legal/privacy.vue';

import PaymentInfo from '../pages/payment/info.vue'
import PaymentConfirm from '../pages/payment/confirm.vue'

import Page404 from '../pages/404.vue';

let prefix = process.env.MIX_COMMERCE_WEB_ROUTE_PREFIX
  ? "/" + process.env.MIX_COMMERCE_WEB_ROUTE_PREFIX
  : "/commerce";

export default [
  {
    path: prefix + '/login',
    name: 'Log In',
    component: Login,
    layout: 'authLayout'
  },
  {
    path: prefix + '/register',
    name: 'Daftar',
    component: Register,
    layout: 'authLayout'
  },
  {
    path: prefix + '/forgot-password',
    name: 'Forgot Password',
    component: ForgotPassword,
    layout: 'authLayout'
  },
  {
    path: prefix + '/reset-password',
    name: 'Reset Password',
    component: ResetPassword,
    layout: 'authLayout'
  },
  {
    path: prefix + '/verify',
    name: 'Verification',
    component: Verification,
    layout: 'authLayout'
  },
  {
    path: prefix + '/',
    name: 'Home',
    component: Home,
    layout: 'defaultLayout',
    meta: {
      title: 'Home - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/category/:slug',
    name: 'Category',
    component: Category,
    layout: 'defaultLayout',
  },
  {
    path: prefix + '/search',
    name: 'Search',
    component: Search,
    layout: 'defaultLayout'
  },
  {
    path: prefix + '/cart',
    name: 'Cart',
    component: Cart,
    layout: 'cartLayout',
    meta: {
      title: 'Keranjang Belanja'
    }
  },
  {
    path: prefix + '/checkout',
    name: 'Checkout',
    component: Checkout,
    layout: 'cartLayout',
    meta: {
      title: 'Checkout'
    }
  },
  {
    path: prefix + '/user/profile',
    name: 'Profile',
    component: Profile,
    layout: 'defaultLayout',
    meta: {
      title: 'Profil - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/address',
    name: 'Address',
    component: Address,
    layout: 'defaultLayout',
    meta: {
      title: 'Alamat - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/address/add',
    name: 'AddAddress',
    component: AddAddress,
    layout: 'defaultLayout',
    meta: {
      title: 'Tambah Alamat - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/address/edit/:id',
    name: 'EditAddress',
    component: EditAddress,
    layout: 'defaultLayout',
    meta: {
      title: 'Edit Alamat - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/password',
    name: 'ChangePassword',
    component: ChangePassword,
    layout: 'defaultLayout',
    meta: {
      title: 'Ubah Password - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/notification',
    name: 'Notification',
    component: Notification,
    layout: 'defaultLayout',
    meta: {
      title: 'Notifikasi - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/order',
    name: 'Order',
    component: Order,
    layout: 'defaultLayout',
    meta: {
      title: 'Pesanan Saya - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/order/:id',
    name: 'OrderDetail',
    component: OrderDetail,
    layout: 'defaultLayout',
    meta: {
      title: 'Pesanan Saya - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/user/order/:id/review',
    name: 'Review',
    component: Review,
    layout: 'defaultLayout',
    meta: {
      title: 'Pesanan Saya - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/discover',
    name: 'ProductList',
    component: ProductList,
    layout: 'defaultLayout',
    meta: {
      title: 'Product List - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/terms-of-service',
    name: 'Terms of Service',
    component: TOS,
    layout: 'legalLayout',
    meta: {
      title: 'Terms of Service - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/privacy',
    name: 'Privacy',
    component: Privacy,
    layout: 'legalLayout',
    meta: {
      title: 'Privasi - Badaso Commerce Theme',
    },
  },
  {
    path: prefix + '/payment/:id/info',
    name: 'PaymentInfo',
    component: PaymentInfo,
    layout: 'paymentLayout',
    meta: {
      title: 'Info Pembayaran',
    },
  },
  {
    path: prefix + '/payment/:id/confirm',
    name: 'PaymentConfirm',
    component: PaymentConfirm,
    layout: 'paymentLayout',
    meta: {
      title: 'Konfirmasi Pembayaran',
    },
  },
  {
    path: prefix + '/:slug',
    name: 'DetailProduct',
    component: DetailProduct,
    layout: 'defaultLayout'
  },
  {
    path: prefix + '*',
    redirect: {
      name: 'Page404'
    }
  },
  {
    path: prefix + '/404',
    name: 'Page404',
    component: Page404,
    layout: 'blankLayout'
  }
]
