<template>
  <div class="mt-4 container">
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
            <router-link :to="{ name: 'Address' }" class="text-sm text-gray-500 px-2 py-1 border rounded">Kelola Alamat</router-link>
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
            <router-link :to="{ name: 'Address' }" class="bg-primary text-white px-3 text-sm py-1 rounded">Kelola Alamat</router-link>
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
            <div class="text-sm" v-if="item.productDetail.discount.active == 1">{{ $currency(getDiscount(item.productDetail.price, item.productDetail.discount)) }}</div>
            <div class="text-sm" v-else>{{ $currency(item.productDetail.price) }}</div>
            <div class="text-sm">{{ item.quantity }}</div>
            <div class="text-sm text-right" v-if="item.productDetail.discount.active == 1">{{ $currency(parseInt(getDiscount(item.productDetail.price, item.productDetail.discount)) * parseInt(item.quantity)) }}</div>
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
          <button tabindex="-1" class="border border-primary px-4 py-2 text-sm font-medium rounded-md text-primary relative">
            Transfer Bank
            <span class="absolute bottom-0 right-0 text-white">
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
        <div class="ml-4 col-span-7 flex gap-6 flex-wrap">
          <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'manual'">
            <radio v-model="radioData" name="bank" data="manual" />
            <div class="border p-2 ml-2 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Transfer Manual (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div>
          <!-- <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'mandiri'">
            <radio v-model="radioData" name="bank" data="mandiri" />
            <img src="https://mall.shopee.co.id/static/images/img_bankid_mandiri.png" class="border p-2 ml-2">
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Bank Mandiri (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div> -->
        </div>
        <div class="col-span-full p-6 mt-8 flex flex-wrap flex-col items-end gap-4 bg-primary bg-opacity-5 border-t border-gray-300">
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left">Subtotal untuk Produk:</div>
            <div class="text-sm text-gray-500">{{ $currency(getTotalCost) }}</div>
          </div>
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left">Total Ongkos Kirim:</div>
            <div class="text-sm text-gray-500">{{ $currency(shippingCost) }}</div>
          </div>
          <!-- <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left flex gap-2 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Biaya Penanganan:
            </div>
            <div class="text-sm text-gray-500">Rp1.000</div>
          </div> -->
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
</template>

<script>
import { mapState } from 'vuex';
import Radio from './../components/form/radio.vue'
export default {
  components: {
    Radio
  },
  data() {
    return {
      radioData: 'manual',
      isAddState: false,
      userAddress: [],
      paymentType: 'manual_bank_transfer',
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
      message: null
    }
  },
  computed: {
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
          let p = val.productDetail.discount.active == 1 
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
      this.$router.push({
        name: 'Cart'
      })
      return
    }
    this.fetchMainAddress()
  },
  methods: {
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
          paymentType: this.paymentType
        })
        .then(res => {
          this.$store.dispatch('FETCH_CARTS')
          this.$store.dispatch('SET_CHECKOUT', [])
          this.$router.push({
            name: 'PaymentInfo',
            params: {
              id: res.data.order
            }
          })
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    }
  }
}
</script>

<style lang="scss" scoped>
.rounded-br-3 {
  border-bottom-right-radius: 0.3rem;
}
</style>