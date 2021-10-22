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
      <div class="grid grid-cols-6 bg-white rounded-xl mb-3">
        <div @click="isActive = index" :class="['py-4 cursor-pointer text-center hover:text-primary transition-colors border-b-2 first:rounded-l-xl last:rounded-r-xl', isActive === index ? 'border-primary text-primary' : 'border-gray-200 text-gray-700']" v-for="(tab, index) in tabs" :key="index">{{ tab }}</div>
      </div>
      <div class="flex items-center mb-3">
        <div class="relative w-full">
          <input type="text" placeholder="Cari berdasarkan Nama Penjual, No. Pesanan atau Nama Produk dalam semua pesanan" class="w-full py-2 text-sm focus:outline-none rounded-xl pl-12 bg-gray-200 pr-1">
          <div class="absolute left-3 h-5 w-5 top-1/2 -translate-y-1/2 transform">
            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
        </div>
      </div>
      <div class="grid gap-y-4">
        <div v-for="order, index in filteredOrders" :key="index">
          <div class="flex flex-wrap bg-white rounded-xl p-4">
            <div class="flex w-full justify-end items-center pb-4">
              <div class="flex space-x-2 items-center" v-if="['process', 'delivering', 'done'].includes(order.status)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                </svg>
                <router-link :to="{ name: 'OrderDetail', params: { id: '80746114475257' } }" class="text-sm text-gray-500">
                  <template v-if="order.status == 'process'">Paket sedang diproses</template>
                  <template v-if="order.status == 'delivering'">Paket sedang dalam perjalanan</template>
                  <template v-if="order.status == 'done'">Paket telah diterima</template>
                </router-link>
              </div>
              <div class="text-sm text-gray-500 border-r pr-2 cursor-default select-none" v-else-if="order.status == 'cancel' && order.cancelMessage">{{ order.cancelMessage }}</div>
              <div class="flex ml-3 items-center divide-x">
                <!-- <tooltip class="pr-2 flex items-center justify-center" placement="right" popoverBaseClass="top-arrow-center top-arrow-center mr-2 arrow-right" trigger="hover">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 tooltip-target text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>

                  <template slot="popover">
                    <p class="tooltip-content">Terakhir Di Update Pada 29-07-2021 17:40</p>
                  </template>
                </tooltip> -->
                <!-- <div v-tooltip.bottom="'Terakhir Di Update Pada 29-07-2021 17:40'" class="pr-2"> -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" v-if="['process', 'delivering', 'done'].includes(order.status)">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <!-- </div> -->
                <span :class="['process', 'delivering', 'done'].includes(order.status) ? 'pl-2' : ''" class="text-sm text-primary tracking-wide uppercase">{{ formatStatus(order.status, order.expiredAt) }}</span>
              </div>
            </div>
            <router-link :to="{ name: 'OrderDetail', params: { id: order.id } }" class="flex w-full flex-col">
              <div class="flex space-x-4 w-full py-4 first:border-t border-b last:border-b-0 last:pb-0 items-start" v-for="orderDetail, index in order.orderDetails" :key="index">
                <img :src="orderDetail.productDetail.productImage" class="border" width="80">
                <div class="flex flex-col">
                  <div class="text-gray-700">{{ orderDetail.productDetail.product.name }}</div>
                  <div class="flex">
                    <div class="px-2 my-2 py-1 text-sm border rounded-md cursor-pointer text-gray-500 border-gray-300">{{ orderDetail.productDetail.name }}</div>
                  </div>
                  <div class="text-sm text-gray-600">x{{ orderDetail.quantity }}</div>
                </div>
                <div class="flex-grow" />
                <div class="self-center text-primary flex items-center">
                  <div class="text-gray-300 mr-2 text-sm line-through" v-if="orderDetail.discounted > 0">{{ $currency(orderDetail.price) }}</div>
                  {{ $currency(parseInt(orderDetail.price - orderDetail.discounted)) }}
                </div>
              </div>
            </router-link>
          </div>
          <div class="bg-white border-t border-dotted p-6 rounded-xl shadow-sm flex flex-nowrap justify-between">
            <div class="flex self-end">
              <div class="text-xs text-gray-500">Tidak ada penilaian diterima</div>
            </div>
            <div class="flex flex-col space-y-4 items-end">
              <div class="flex space-x-3 items-center">
                <div class="text-sm">Total Pesanan:</div>
                <div class="text-2xl text-primary">{{ $currency(parseInt(order.payed)) }}</div>
              </div>
              <div class="flex items-center space-x-2">
                <button @click="review(order.id)" class="text-sm bg-primary text-white py-2 rounded-md w-40 font-medium hover:brightness-90 bg-blend-darken filter" v-if="order.status === 'done' && !isReviewIsNull(order.orderDetails)">Nilai</button>
                <!-- <button class="text-sm bg-primary bg-opacity-0 hover:bg-opacity-5 text-gray-700 py-2 rounded-md w-40 border">Hubungi Penjual</button> -->
                <button class="text-sm bg-primary bg-opacity-0 hover:bg-opacity-5 text-gray-700 py-2 rounded-md w-40 border" @click="$router.push({ name: 'DetailProduct', params: { slug: order.orderDetails[0].productDetail.product.slug }})">Beli Lagi</button>
                <button class="text-sm bg-primary hover:bg-opacity-90 text-white py-2 rounded-md w-40 border" v-if="order.status === 'waitingBuyerPayment'">
                  <component
                    :is="`${order.orderPayment.paymentType}-pay`"
                    :order="order"
                  >Bayar</component>
                </button>
                {{ searchOrder }}
              </div>
            </div>
          </div>
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
      isActive: 0,
      tabs: [
        'Semua',
        'Belum Bayar',
        'Diproses',
        'Dikirim',
        'Selesai',
        'Dibatalkan'
      ],
      orders: [],
      search: 'ab',
    }
  },
  computed: {
    filteredOrders() {
      if (this.isActive === 0) {
        return this.orders
      } else if (this.isActive === 1) {
        return this.$_.filter(this.orders, { status: 'waitingBuyerPayment' })
      } else if (this.isActive === 2) {
        return this.$_.filter(this.orders, function(o) { return o.status === 'waitingSellerConfirmation' || o.status === 'process'; })
      } else if (this.isActive === 3) {
        return this.$_.filter(this.orders, { status: 'delivering' })
      } else if (this.isActive === 4) {
        return this.$_.filter(this.orders, { status: 'done' })
      } else {
        return this.$_.filter(this.orders, { status: 'cancel' })
      }
    },
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      user(state) {
        return state.user
      },
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
    isReviewIsNull(orderDetails) {
      return this.$_.every(orderDetails, 'review')
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
    fetchOrders() {
      this.$api.badasoOrder
        .browse()
        .then(res => {
          this.orders = res.data.orders
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    review(id) {
      this.$router.push({
        name: 'Review',
        params: {
          id
        }
      })
    }
  }
}
</script>
