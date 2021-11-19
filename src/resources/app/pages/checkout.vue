<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="mt-4 container hidden sm:block">
      <div class="bg-white rounded-xl shadow-md">
        <div class="p-6">
          <div class="flex text-primary items-center text-lg justify-between">
            <span class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
              </svg>
              Alamat Pengiriman
            </span>
            <template v-if="isAddState">
              <Link :href="route('badaso.commerce-theme.address')" class="text-sm text-gray-500 px-2 py-1 border rounded">Kelola Alamat</Link>
            </template>
          </div>
          <template v-if="userAddress.length > 0">
            <template v-if="isAddState">
              <div class="flex flex-wrap gap-2 mt-2 items-center p-4">
                <div class="flex items-center gap-4 cursor-pointer w-full" v-for="address, index in userAddress" :key="index" @click="addressSelected = address">
                  <radio v-model="addressSelected" name="address" :data="address" />
                  <div class="flex gap-8 items-center w-full">
                    <b>{{ address.recipientName }}<br />{{ address.phoneNumber }}</b>
                    <span class="flex-grow">{{ address.addressLine1 }}{{ address.addressLine2 ? ' '+ address.addressLine2 : '' }}, {{ address.city }}, {{ getMainAddressCountry(address.country) }}, {{ address.country }} {{ address.postalCode }}</span>
                    <span v-if="address.isMain == 1" class="text-sm text-gray-500">Utama</span>
                  </div>
                </div>
                <div class="flex gap-4 items-center mt-4">
                  <button class="bg-primary px-3 py-1 w-24 text-white rounded" @click="isAddState = false">OK</button>
                </div>
              </div>
            </template>
            <template v-else>
              <div class="flex flex-nowrap gap-8 mt-2 items-center">
                <div class="break-words font-bold">{{ addressSelected.recipientName }}</div>
                <div class="flex-grow">{{ addressSelected.addressLine1 }}{{ addressSelected.addressLine2 ? ' '+ addressSelected.addressLine2 : '' }}, {{ addressSelected.city }}, {{ getMainAddressCountry(addressSelected.country) }}, {{ addressSelected.country }} {{ addressSelected.postalCode }}</div>
                <div v-if="addressSelected.isMain == 1" class="text-sm font-medium text-gray-400">Utama</div>
                <div class="text-sm font-medium text-primary cursor-pointer" @click="isAddState = true">UBAH</div>
              </div>
            </template>
          </template>
          <template v-else>
            <div class="flex flex-nowrap gap-2 mt-2 items-center justify-center flex-col">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-gray-700 text-center text-sm mt-2">No user addresses was found.</span>
              <Link :href="route('badaso.commerce-theme.address')" class="bg-primary text-white px-3 text-sm py-1 rounded">Kelola Alamat</Link>
            </div>
          </template>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-md mt-4">
        <div class="p-6 grid">
          <div class="gap-2 grid grid-cols-6">
            <div class="col-span-2 text-lg font-medium">Produk Dipesan</div>
            <div></div>
            <div class="text-gray-300 text-sm">Harga Satuan</div>
            <div class="text-gray-300 text-sm">Jumlah</div>
            <div class="text-gray-300 text-sm text-right">Subtotal Produk</div>
          </div>
          <div class="divide-y divide-dashed border-b border-dashed mt-4">
            <div class="gap-2 grid grid-cols-6 items-center py-4" v-for="item, index in items" :key="index">
              <div class="col-span-2 flex gap-4 items-center">
                <img :src="item.productDetail.productImage" class="w-12 h-12">
                <div class="line-clamp-1">{{ item.productDetail.product.name }}</div>
              </div>
              <div class="text-sm text-gray-400 pl-4">Variasi: {{ item.productDetail.name }}</div>
              <div class="text-sm" v-if="item.productDetail.discount !== null && item.productDetail.discount.active == 1">{{ $currency(getDiscount(item.productDetail.price, item.productDetail.discount)) }}</div>
              <div class="text-sm" v-else>{{ $currency(item.productDetail.price) }}</div>
              <div class="text-sm">{{ item.quantity }}</div>
              <div class="text-sm text-right" v-if="item.productDetail.discount !== null && item.productDetail.discount.active == 1">{{ $currency(parseInt(getDiscount(item.productDetail.price, item.productDetail.discount)) * parseInt(item.quantity)) }}</div>
              <div class="text-sm text-right" v-else>{{ $currency(item.productDetail.price * parseInt(item.quantity)) }}</div>
            </div>
          </div>
          <div class="grid grid-cols-6 items-center border-b border-dashed">
            <div class="col-span-4 flex items-center gap-4 border-r py-4 border-dashed pr-4 text-sm">
              Pesan:
              <textarea v-model="message" class="text-sm resize w-full focus:outline-none focus:ring-0 focus:ring-offset-0 form-textarea focus:border-primary border-gray-300" rows="1" placeholder="(Optional) Tinggalkan pesan ke penjual"></textarea>
            </div>
            <div class="col-span-2 flex items-center justify-between gap-4 pl-4 py-4">
              <div class="text-sm text-gray-400">Ongkos Kirim</div>
              <div class="text-sm">{{ $currency(shippingCost) }}</div>
            </div>
          </div>
          <div class="flex pt-6 justify-end gap-4 items-center">
            <div class="text-sm text-gray-400">Total Pesanan ({{ items.length }} Produk): </div>
            <div class="text-xl text-primary">{{ $currency(getTotalCost + parseInt(shippingCost)) }}</div>
          </div>
        </div>
      </div>
      <div class="bg-white rounded-xl shadow-md mt-4">
        <div class="grid grid-cols-8">
          <div class="pl-6 pt-6 text-lg leading-tight font-medium text-gray-700">Metode Pembayaran</div>
          <div class="ml-4 pt-6 col-span-7 flex gap-4 flex-wrap">
            <button v-for="p, index in payments" :key="index" tabindex="-1" class="border border-primary px-4 py-2 text-sm font-medium rounded-md text-primary relative" @click="setPaymentTab(p)">
              {{ p.name }}
              <span v-if="p.slug === payment" class="absolute bottom-0 right-0 text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 absolute bottom-0 right-0" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                <svg class="h-5 w-5 rounded-br-3 text-primary" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path transform="rotate(-90 12 12)" d="m0,24.00582l0,-24.00582l24.00582,24.00582l-24.00582,0z" fill="currentColor"/>
                </svg>
              </span>
            </button>
          </div>
          <div class="col-span-full my-8 h-px w-full bg-gray-300" />
          <div class="pl-6 text-lg leading-tight font-medium text-gray-700">Pilih Bank</div>
    
          <commerce-payment v-model="option" :active="payment" :payments="payments" @checkout="checkoutData = $event" />
          <div class="col-span-full p-6 mt-8 flex flex-wrap flex-col items-end gap-4 bg-primary bg-opacity-5 border-t border-gray-300">
            <div class="w-1/3 flex justify-between items-center flex-1">
              <div class="text-sm text-gray-500 text-left">Subtotal untuk Produk:</div>
              <div class="text-sm text-gray-500">{{ $currency(getTotalCost) }}</div>
            </div>
            <div class="w-1/3 flex justify-between items-center flex-1">
              <div class="text-sm text-gray-500 text-left">Total Ongkos Kirim:</div>
              <div class="text-sm text-gray-500">{{ $currency(shippingCost) }}</div>
            </div>
            <div class="w-1/3 flex justify-between items-center flex-1">
              <div class="text-sm text-gray-500 text-left">Total Pembayaran:</div>
              <div class="text-3xl text-primary">{{ $currency(getTotalCost + parseInt(shippingCost)) }}</div>
            </div>
          </div>
          <div class="col-span-full p-6 flex rounded-b-xl flex-wrap flex-col items-end gap-4 bg-primary border-dashed bg-opacity-5 border-t border-gray-300">
            <button @click="checkout" class="bg-primary px-12 py-2 text-white rounded-lg font-medium">
              Buat Pesanan
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="block sm:hidden relative">
      <div class="p-2 bg-white h-14 fixed bottom-0 left-0 right-0">
        <div class="bg-primary text-white flex w-full items-center justify-center h-full rounded-md uppercase text-sm" v-if="option && addressSelected.id" @click="checkout">
          Buat Pesanan
        </div>

        <div class="bg-gray-200 text-gray-400 flex w-full items-center justify-center h-full rounded-md uppercase text-sm" v-else>
          Buat Pesanan
        </div>
      </div>
    </div>

    <div class="sm:hidden relative">
      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div key="background" v-if="addressDialog" class="fixed inset-0 w-screen h-screen bg-black z-80 bg-opacity-50" @click="closeAddressDialog" />
      </transition>
      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-40 translate-y-full"
        enter-to-class="opacity-100 translate-y-0"
        leave-class="opacity-100 translate-y-0"
        leave-to-class="opacity-40 translate-y-full"
      >
        <div class="fixed bottom-0 p-3 transform origin-bottom right-0 left-0 w-full flex gap-4 flex-wrap z-90 bg-white rounded-t-md" v-if="addressDialog">
          <div class="flex bg-white w-full flex-row items-center gap-2" :class="index > 0 ? 'border-t pt-4' : ''" v-for="address, index in userAddress" :key="index" @click="setDefaultUserAddress(address)">
            <div class="flex-grow flex flex-col">
              <div class="text-sm mb-1">{{ address.recipientName }} | {{ address.phoneNumber }}</div>
              <div class="text-xs">{{ address.addressLine1 }}{{ address.addressLine2 ? `, ${address.addressLine2}` : '' }}</div>
              <div class="text-xs">{{ address.city }} - {{ address.country }} {{ address.postalCode }}</div>
            </div>
            <div class="flex-shrink text-gray-400">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <div class="sm:hidden relative">
      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div key="background" v-if="paymentDialog" class="fixed inset-0 w-screen h-screen bg-black z-80 bg-opacity-50" @click="closePaymentDialog" />
      </transition>
      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-40 translate-y-full"
        enter-to-class="opacity-100 translate-y-0"
        leave-class="opacity-100 translate-y-0"
        leave-to-class="opacity-40 translate-y-full"
      >
        <div class="fixed bottom-0 p-3 transform origin-bottom right-0 left-0 w-full gap-4 flex-wrap z-90 bg-white rounded-t-md overflow-y-scroll max-h-screen" v-if="paymentDialog">
          <div v-for="payment, index in payments" :key="index" class="py-4 flex justify-between w-full items-center border-b last:border-b-0 text-sm w-full flex-wrap">
            <div class="w-full flex justify-between" @click="togglePaymentOptionState(payment.id)">
              {{ payment.name }}
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
              </svg>
            </div>

            <transition
              enter-active-class="transition-all ease-out duration-75"
              leave-active-class="transition-all ease-in duration-75"
              enter-class="opacity-40"
              enter-to-class="opacity-100"
              leave-class="opacity-100"
              leave-to-class="opacity-40"
            >
              <div class="w-full flex items-center flex-wrap pl-8" v-if="paymentOptionState.includes(payment.id)">
                <component :is="o.slug" v-for="o, index in sortedOptions(payment.options)" :key="index" class="w-full flex items-center justify-between py-4" @checkout="setPaymentOption($event, o, payment)" :option="o">
                  <div class="flex gap-2 items-center justify-center">
                    <img :src="o.image" class="h-6 w-6 object-contain object-center" />                      
                    <div class="w-full text-sm">{{ o.name }}</div>
                  </div>
                  <radio v-model="option" name="payment" :data="o.slug" />
                </component>
              </div>
            </transition>
          </div>
        </div>
      </transition>
    </div>

    <div class="block sm:hidden pb-16">
      <div class="flex bg-white flex flex-row items-center gap-2 p-3" @click="openAddressDialog">
        <div class="flex-shrink text-primary self-start">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div class="flex-grow flex flex-col">
          <div class="text-sm mb-1">Alamat Pengiriman</div>
          <div class="text-xs">{{ addressSelected.recipientName }} | {{ addressSelected.phoneNumber }}</div>
          <div class="text-xs">{{ addressSelected.addressLine1 }}{{ addressSelected.addressLine2 ? `, ${addressSelected.addressLine2}` : '' }}</div>
          <div class="text-xs">{{ addressSelected.city }} - {{ addressSelected.country }} {{ addressSelected.postalCode }}</div>
        </div>
        <div class="flex-shrink text-gray-400">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </div>
      </div>

      <div class="flex bg-white flex-col justify-center items-start my-3">
        <div class="p-3 flex flex-col gap-3 border-b">
          <div class="flex flex-row flex-nowrap gap-3" v-for="item, index in items" :key="index">
            <div class="w-1/4">
              <img :src="item.productDetail.productImage" alt="" class="w-full h-full">
            </div>
            <div class="w-3/4 flex flex-col justify-between">
              <div class="line-clamp-1 text-sm text-gray-600">{{ item.productDetail.product.name }}</div>
              <div class="text-xs text-gray-500">Variasi: {{ item.productDetail.name }}</div>
              <div class="text-sm text-gray-500 flex justify-between w-full items-center">
                <span>{{ $currency(item.productDetail.price) }}</span>
                <span class="text-xs">x{{ item.quantity }}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="p-3 flex justify-between w-full text-sm border-b">
          <div>Pesan:</div>
          <div>
            <input type="text" v-model="message" class="outline-none focus:outline-none text-right" placeholder="Silakan tinggalkan pesan...">
          </div>
        </div>

        <div class="p-3 flex justify-between text-sm w-full">
          <div>Total Pesanan ({{ items.length }} Produk):</div>
          <div class="font-medium text-primary">{{ $currency(getTotalCost) }}</div>
        </div>
      </div>

      <div class="p-3 flex w-full bg-white justify-between items-start border-b" @click="openPaymentDialog">
        <div class="text-sm flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span class="text-gray-500">Metode Pembayaran</span>
        </div>
        <div class="1/4 text-sm flex items-center">
          <span class="text-primary" v-if="!option">Pilih Metode<br />Pembayaran</span>
          <span class="text-primary text-right" v-else>{{ selectedPaymentOption }}</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7" />
          </svg>
        </div>
      </div>

      <div class="p-3 flex w-full bg-white flex-col gap-1">
        <div class="flex justify-between items-center">
          <div class="text-xs text-gray-700">Subtotal untuk Produk</div>
          <div class="text-xs text-gray-700">{{ $currency(getTotalCost) }}</div>
        </div>
        <div class="flex justify-between items-center">
          <div class="text-xs text-gray-700">Subtotal Pengiriman</div>
          <div class="text-xs text-gray-700">{{ $currency(shippingCost) }}</div>
        </div>
        <div class="flex justify-between items-center">
          <div class="text-gray-700">Total Pembayaran</div>
          <div class="text-primary">{{ $currency(getTotalCost + parseInt(shippingCost)) }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import CommercePayment from './../components/commerce-payment.vue'

import appLayout from '../layouts/app.vue'
import cartLayout from '../layouts/cart.vue'
import { Link, Head } from '@inertiajs/inertia-vue'
export default {
  layout: [appLayout, cartLayout],
  components: {
    CommercePayment,
    Link,
    Head,
  },
  data() {
    return {
      payment: 'transfer-bank',
      option: '',
      isAddState: false,
      userAddress: [],
      addressSelected: {
        id: null,
        recipientName: null,
        addressLine1: null,
        addressLine2: null,
        city: null, 
        postalCode: null,
        country: null,
        phoneNumber: null,
        isMain: null,
      },
      message: null,
      payments: [],
      checkoutData: null,
      addressDialog: false,
      paymentDialog: false,
      paymentOptionState: [],
    }
  },
  computed: {
    selectedPaymentOption() {
      let payment = this.payments.find(item => item.options.find(option => option.slug === this.option))
      return `${payment.name} - ${payment.options.find(option => option.slug === this.option).name}`
    },
    ...mapState({
      items(state) {
        return state.checkout
      },
      country(state) {
        return JSON.parse(this.$_.find(state.moduleConfigurations, { key: "allowedCountries" }).value);
      },
      shippingCost(state) {
        return this.$_.find(state.moduleConfigurations, { key: "commerceFixRateShippingCost" }).value
      },
      getTotalCost(state) {
        let total = 0

        state.checkout.forEach(val => {
          let p = val.productDetail.discount !== null && val.productDetail.discount.active == 1 
            ? this.getDiscount(val.productDetail.price, val.productDetail.discount)
            : val.productDetail.price
          total += p * val.quantity
        })

        return total
      }
    })
  },
  mounted() {
    if (this.items.length <= 0) {
      this.$inertia.visit(this.route('badaso.commerce-theme.home'))
      return
    }
    this.fetchMainAddress()
    this.fetchCarts()
    this.fetchSupportedPayments()
  },
  methods: {
    fetchCarts() {
      this.$openLoading()
      let ids = []
      for (const item of this.items) {
        ids.push(item.id)
      }
      this.$api.badasoCart
        .validateIds({
          ids: this.$_.join(ids, ',')
        })
        .then(res => {
          if (!res.data.cart) {
            this.$inertia.visit(this.route('badaso.commerce-theme.cart'))
          }
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    },
    fetchSupportedPayments() {
      this.$openLoading()
      this.$api.badasoPayment
        .supportedPayments()
        .then(res => {
          this.payments = res.data.payments
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    },
    fetchMainAddress() {
      this.$openLoading()
      this.$api.badasoUserAddress
        .browse()
        .then(res => {
          this.userAddress = res.data.userAddresses
          this.addressSelected = this.$_.find(res.data.userAddresses, { isMain: 1 }) || res.data.userAddresses[0]
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    },
    getMainAddressCountry(country) {
      return this.$_.find(this.country, { alpha2Code: country }).name
    },
    getDiscount(price, discount) {
      let d = 0
      if (discount.discountType === 'fixed') {
        d = discount.discountFixed;
      } else {
        d = discount.discountPercent * price / 100
      }
      return parseInt(price - d)
    },
    checkout() {
      this.$openLoading()
      this.$api.badasoCheckout
        .finish({
          items: this.items.map(val => {
            return val.id
          }),
          userAddressId: this.addressSelected.id,
          message: this.message,
          paymentType: this.option
        })
        .then(res => {
          this.$store.dispatch('FETCH_CARTS')

          this.$helper.alert('Transaksi sedang diproses, mohon tetap dihalaman ini.')
          
          if (typeof this.checkoutData === 'function') {
            this.checkoutData(res)
          }
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    },
    setPaymentTab(p) {
      this.option = ''
      this.payment = p.slug; 
    },
    openAddressDialog() {
      this.addressDialog = true
    },
    closeAddressDialog() {
      this.addressDialog = false
    },
    setDefaultUserAddress(address) {
      this.addressSelected = {...address}
      this.closeAddressDialog()
    },
    closePaymentDialog() {
      this.paymentDialog = false
    },
    openPaymentDialog() {
      this.paymentDialog = true
    },
    togglePaymentOptionState(id) {
      if (this.paymentOptionState.includes(id)) {
        this.paymentOptionState.splice(this.paymentOptionState.indexOf(id), 1)
      } else {
        this.paymentOptionState.push(id)
      }
    },
    setPaymentOption($event, { slug }, payment) {
      this.checkoutData = $event
      this.option = slug
      this.payment = payment.slug
      this.closePaymentDialog()
    },
    sortedOptions(option) {
      return this.$_.sortBy(option, ['order'], ['asc'])
    }
  },
  beforeDestroy() {
    this.$store.dispatch('SET_CHECKOUT', [])
  }
}
</script>
