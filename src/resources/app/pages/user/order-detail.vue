<template>
  <div class="pt-8 container grid grid-cols-profile">
    <div class="pr-8">
      <div class="h-22 flex items-center border-b">
        <div class="h-16 w-16 items-center justify-center clip-circle">
          <img :src="user.avatar" alt="User's avatar" class="object-cover h-16 w-16">
        </div>
        <div class="inline-block flex-wrap pl-2">
          <div class="text-sm font-medium w-full line-clamp-1 text-gray-700">{{ user.name }}</div>
          <router-link :to="{ name: 'Profile' }" class="text-sm text-gray-500 w-full flex items-center gap-1 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
            Ubah Profil
          </router-link>
        </div>
      </div>
      <div class="mt-4 flex items-center space-y-3 flex-wrap">
        <router-link :to="{ name: 'Profile' }" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-gray-700 font-semibold group-hover:text-primary transition-colors text-sm pl-2">Akun Saya</span>
        </router-link>
        <router-link :to="{ name: 'Order' }" class="w-full inline-flex items-center group text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
          <span class="font-semibold cursor-pointer transition-colors text-sm pl-2">Pesanan Saya</span>
        </router-link>
        <router-link :to="{ name: 'Notification' }" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Notifikasi</span>
        </router-link>
      </div>
    </div>
    <div class="px-6">
      <div class="flex justify-between px-4 items-center text-sm bg-white rounded-xl text-gray-700">
        <div @click="$router.back()" class="my-4 cursor-pointer text-center uppercase flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
          Kembali
        </div>
        <div class="divide-x flex space-x-4">
          <div>NO. PESANAN. {{ $route.params.id }}</div>
          <div class="pl-4 text-primary uppercase">{{ formatStatus(order.status) }}</div>
        </div>
      </div>
      <div class="flex items-start bg-white border-t border-dotted w-full p-12 rounded-lg text-primary" >
        <div class="flex flex-col items-center justify-center">
          <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'waitingBuyerPayment' ? 'bg-primary text-white' : 'ring-4 ring-primary ring-inset' ]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="m19,21l0,-16a2,2 0 0 0 -2,-2l-10,0a2,2 0 0 0 -2,2l0,16l3.5,-2l3.5,2l3.5,-2l3.5,2z" stroke-width="2" stroke-linejoin="round" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Dibuat</div>
        </div>
        <template v-if="order.status !== 'cancel'">
          <div class="flex-auto h-16 flex items-center -mx-8"><div class="bg-primary h-1 w-full" /></div>
          <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'waitingSellerConfirmation' ? 'bg-primary text-white' : 'ring-4 ring-primary ring-inset' ]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Dikonfirmasi</div>
          </div>
        </template>
        <template v-if="order.status !== 'cancel'">
          <div class="flex-auto h-16 flex items-center -mx-8"><div class="bg-primary h-1 w-full" /></div>
          <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'process' ? 'bg-primary text-white' : 'ring-4 ring-primary ring-inset' ]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
            </div>
            <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Diproses</div>
          </div>
        </template>
        <template v-if="order.status !== 'cancel'">
          <div class="flex-auto h-16 flex items-center -mx-8"><div class="bg-primary h-1 w-full" /></div>
          <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'delivering' ? 'bg-primary text-white' : 'ring-4 ring-primary ring-inset' ]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
              </svg>
            </div>
            <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Dikirim</div>
          </div>
        </template>
        <template v-if="order.status !== 'cancel'">
          <div class="flex-auto h-16 flex items-center -mx-8"><div class="bg-primary h-1 w-full" /></div>
          <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'done' ? 'bg-primary text-white' : 'ring-4 ring-primary ring-inset' ]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
              </svg>
            </div>
            <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Selesai</div>
          </div>
        </template>
        <template v-if="order.status === 'cancel'">
          <div class="flex-auto h-16 flex items-center -mx-8"><div class="bg-primary h-1 w-full" /></div>
          <div class="flex flex-col items-center justify-center">
            <div class="flex flex-col rounded-full w-16 items-center justify-center h-16" :class="[order.status === 'cancel' ? 'bg-red-600 text-white' : 'ring-4 ring-primary ring-inset' ]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </div>
            <div class="text-sm text-gray-700 w-32 text-center mt-6 mb-1">Pesanan Dibatalkan</div>
          </div>
        </template>
      </div>
      <div class="bg-white rounded-xl border-t border-dotted">
        <div class="flex justify-end cursor-pointer select-none border-b items-center text-sm bg-primary bg-opacity-5 rounded-t-xl text-gray-700 px-6 py-4" v-if="order.status === 'waitingBuyerPayment'">
          <component :is="`${order.orderPayment.paymentType}-pay`" :order="order" class="text-sm text-center bg-primary text-white py-2 rounded-md w-40 font-medium hover:brightness-90 bg-blend-darken filter">
            Bayar
          </component>
        </div>
        <div class="flex justify-between items-center text-sm bg-primary bg-opacity-5 rounded-b-xl text-gray-700 px-6 py-4">
          <div class="text-center text-xs text-gray-400 flex flex-col items-start text-left w-1/3">
            <template v-if="order.status === 'cancel'">
              Kelihatannya pesanan kamu dibatalkan karena {{ order.cancelMessage }}
            </template>
            <span>Terima kasih sudah berbelanja di {{ title }}!</span>
          </div>
          <button @click="$router.push({ name: 'DetailProduct', params: { slug: order.orderDetails[0].productDetail.product.slug }})" class="text-sm bg-primary text-white py-2 rounded-md w-40 font-medium hover:brightness-90 bg-blend-darken filter">Beli Lagi</button>
        </div>
      </div>
      <!-- <div class="bg-white rounded-t-xl border-t border-dotted">
        <div class="flex justify-end items-center text-sm bg-primary bg-opacity-5 rounded-t-xl text-gray-700 px-6 py-4">
          <button class="text-sm bg-white hover:bg-opacity-5 text-gray-700 py-2 rounded-md w-40 border">Hubungi Penjual</button>
        </div>
      </div> -->
      <div class="bg-white flex flex-wrap rounded-t-xl border-t border-dotted justify-between items-center text-sm text-gray-700 p-6">
        <div class="w-full pb-6 flex justify-between">
          <div class="text-center text-lg text-gray-700 font-medium flex items-center">Alamat Pengiriman</div>
          <div class="text-center text-xs text-gray-400 flex items-center" v-if="order.trackingNumber">No. Resi: {{ order.trackingNumber }}</div>
        </div>
        <div class="w-full flex divide-x">
          <div class="flex w-1/3 flex-col space-y-1 pr-6">
            <div class="text-gray-700 text-lg mb-1">{{ order.orderAddress.recipientName }}</div>
            <div class="text-gray-400 text-md">{{ order.orderAddress.phoneNumber }}</div>
            <div class="text-gray-400 text-md">{{ order.orderAddress.addressLine1 }}, {{ order.orderAddress.addressLine2 ? order.orderAddress.addressLine2 + ', ' : '' }}{{ order.orderAddress.country }} {{ order.orderAddress.postalCode }}, {{ getCountryFullText(order.orderAddress.country) }}</div>
          </div>
        </div>
      </div>
      <div class="bg-gray-50 py-4 px-6">
        <div class="flex justify-end mb-4">
          <tooltip text="Terakhir Di Update Pada 29-07-2021 17:40">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </tooltip>
        </div>
        <div class="flex w-full flex-col">
          <router-link :to="{ name: 'DetailProduct', params: { slug: orderDetail.productDetail.product.slug } }" class="flex space-x-4 w-full py-4 first:border-t border-b last:border-b-0 last:pb-0 items-start" v-for="orderDetail, index in order.orderDetails" :key="index">
            <img :src="orderDetail.productDetail.productImage" class="border w-20">
            <div class="flex flex-col">
              <div class="text-gray-700">{{ orderDetail.productDetail.product.name }}</div>
              <div class="text-gray-500 text-sm">Variant: {{ orderDetail.productDetail.name }}</div>
              <div class="text-sm text-gray-600">x{{ orderDetail.quantity }}</div>
            </div>
            <div class="flex-grow" />
            <div class="self-center text-primary flex items-center">
              <div class="text-gray-300 mr-2 text-sm line-through" v-if="orderDetail.discounted">{{ $currency(orderDetail.price) }}</div>
              {{ $currency(orderDetail.price - orderDetail.discounted) }}
            </div>
          </router-link>
        </div>
      </div>
      <div class="bg-gray-50 border-t divide-y flex flex-wrap divide-dotted shadow-sm">
        <div class="flex w-full divide-x divide-dotted items-center">
          <div class="flex w-2/3 justify-end p-3 text-xs text-gray-500">Subtotal Produk</div>
          <div class="flex w-1/3 justify-end p-3 pr-6 text-sm text-gray-700">{{ $currency(order.total - order.discounted) }}</div>
        </div>
        <div class="flex w-full divide-x divide-dotted items-center">
          <div class="flex w-2/3 justify-end p-3 text-xs text-gray-500">Pengiriman</div>
          <div class="flex w-1/3 justify-end p-3 pr-6 text-sm text-gray-700">{{ $currency(order.shippingCost) }}</div>
        </div>
        <div class="flex w-full divide-x divide-dotted items-center">
          <div class="flex w-2/3 justify-end p-3 text-xs text-gray-500">Total Pesanan</div>
          <div class="flex w-1/3 justify-end p-3 pr-6 text-2xl text-primary">{{ $currency(order.payed) }}</div>
        </div>
        <div class="flex w-full divide-x divide-dotted items-center">
          <div class="flex w-2/3 justify-end p-3 text-xs text-gray-500">Metode Pembayaran</div>
          <div class="flex w-1/3 justify-end p-3 pr-6 text-sm text-gray-700">{{ paymentOption.name }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Tooltip from '../../components/tooltip/tooltip.vue'
import Radio from './../../components/form/radio.vue'
export default {
  components: {
    Radio,
    Tooltip
  },
  data() {
    return {
      order: {
        orderDetails: [],
        recipientName: null,
        addressLine1: null,
        addressLine2: null,
        city: null,
        postalCode: null,
        country: null,
        phoneNumber: null,
        discounted: null,
        total: null,
        shippingCost: null,
        payed: null,
        status: null,
        trackingNumber: null,
        message: null,
        cancelMessage: null,
        expiredAt: null,
        createdAt: null,
        orderPayment: {
          token: null
        }
      },
      paymentOption: {
        name: null
      }
    }
  },
  computed: {
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      user(state) {
        return state.user
      },
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
      countries(state) {
        return (JSON.parse(this.$_.find(state.moduleConfigurations, { key: "allowedCountries" }).value)).map((val) => {
          return {
            text: val.name,
            value: val.alpha2Code
          }
        });
      }
    }),
  },
  mounted() {
    if (!this.isAuthenticated) {
      this.$router.push({
        name: "Log In"
      }).catch(() => {})
    }

    this.fetchOrders()
  },
  methods: {
    fetchOrders() {
      this.$api.badasoOrder
        .read({ id: this.$route.params.id })
        .then(res => {
          this.order = res.data.order
          this.paymentOption = res.data.paymentOption
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    formatStatus(status, expiredAt) {
      switch (status) {
        case 'cancel':
          return 'Gagal'
        case 'waitingBuyerPayment':
          return 'Menunggu Pembayaran'
        case 'waitingSellerConfirmation':
          return 'Menunggu Konfirmasi Penjual'
        case 'process':
          return 'Sedang Diproses'
        case 'delivering':
          return 'Sedang Dikirim'
        case 'done':
          return 'Selesai'
        default:
          break;
      }
    },
    getCountryFullText(country) {
      if (!country) return null
      return this.$_.find(this.countries, { value: country }).text
    },
  }
}
</script>
