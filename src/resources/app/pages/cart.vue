<template>
  <div class="container pt-8 grid gap-4 auto-rows-min">
    <div class="bg-white px-8 py-4 grid grid-cols-6 gap-4 shadow-sm rounded-xl">
      <div class="col-span-2 text-sm text-gray-700 font-medium">Produk</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Harga Satuan</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Kuantitas</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Total Harga</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Aksi</div>
    </div>
    <div class="bg-white px-8 py-8 flex shadow-sm rounded-xl flex-wrap gap-4">
      <template v-if="carts.length > 0">
        <div class="grid grid-cols-6 gap-4 w-full" v-for="cart, index in carts" :key="index">
          <div class="col-span-2 flex gap-4 items-center">
            <input type="checkbox" v-model="checkboxModel" :id="cart.id" :value="cart.id" class="h-4 w-4 focus:ring-primary focus:outline-none rounded-sm text-primary form-checkbox">
            <div class="text-sm text-gray-700 w-24 h-24">
              <img :src="cart.productDetail.productImage" class="w-full h-full">
            </div>
            <div class=" flex-1 text-sm">
              <Link :to="{ name: 'DetailProduct', params: { slug: cart.productDetail.product.slug } }" class="line-clamp-2">{{ cart.productDetail.product.name }}</Link>
              <div class="text-sm mt-2">Variasi: 
                <span class="border border-gray-300 px-1.5 py-1 cursor-pointer ml-2 rounded-md text-gray-500 text-xs">{{ $voca.titleCase(cart.productDetail.name) }}</span>
              </div>
            </div>
          </div>
          <div class="col-span-1 text-sm text-gray-700 text-center flex items-center">
            <template v-if="cart.productDetail.discount.active == 1">
              <span class="line-through text-gray-400">{{ $currency(cart.productDetail.price) }}</span>&nbsp;{{ $currency(getDiscount(cart.productDetail.price, cart.productDetail.discount)) }}
            </template>
            <template v-else>
              <span class="text-gray-700">{{ $currency(cart.productDetail.price) }}</span>
            </template>
          </div>
          <div class="col-span-1 text-sm text-gray-700 text-center flex items-center justify-center">
            <counter @input="changeQuantity($event, cart.id)" v-model="cart.quantity" :min="1" text-disabled :disabled="loading" />
          </div>
          <div class="col-span-1 text-sm text-primary text-center justify-center flex items-center">
            <template v-if="cart.productDetail.discount.active == 1">
              {{ $currency(getDiscount(cart.productDetail.price, cart.productDetail.discount) * parseInt(cart.quantity)) }}
            </template>
            <template v-else>
              {{ $currency(cart.productDetail.price * cart.quantity) }}
            </template>
          </div>
          <div class="col-span-1 text-sm text-gray-700 text-center flex items-center justify-center">
            <button @click="deleteCart(cart.id)" class="focus:outline-none ring-1 ring-red-500 p-1.5 text-red-500 rounded hover:bg-red-50">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
              </svg>
            </button>
          </div>
          <div class="col-span-full" v-if="index !== carts.length - 1">
            <div class="h-px w-full bg-gray-300" />
          </div>
        </div>
      </template>
      <template v-else>
        <div class="p-2 h-40 w-full flex justify-center gap-2 items-center flex-col text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
          <span class="text-sm">Belum Ada Produk</span>
        </div>
      </template>
    </div>

    <div class="bg-white px-8 py-4 flex gap-4 shadow-sm rounded-xl justify-end">
      <div class="flex flex-wrap items-center float-right gap-1">
        <div class="flex items-center gap-4 w-full float-right justify-end">
          Total ({{ checkboxModel.length }} produk):
          <span class="text-2xl text-primary">{{ $currency(getTotal) }}</span>
        </div>
        <div class="flex items-center gap-4 text-sm w-full float-right justify-end">
          Hemat
          <span class="text-primary">{{ $currency(getSaving) }}RB</span>
        </div>
      </div>
      <div class="flex items-center w-48">
        <button @click="checkout" class="font-medium bg-primary text-white p-2 font-sm w-full rounded-md">
          CHECKOUT
        </button>
      </div>
    </div>

    <div class="flex gap-2 w-full mt-8 flex-wrap">
      <div class="text-gray-400 font-medium w-full">
        KAMU MUNGKIN JUGA SUKA
      </div>
      <carousel class="container" show="6">
        <carousel-item v-for="product, index in similarProducts.data" :key="index">
          <commerce-product-alt :product="product" />
        </carousel-item>
      </carousel>
    </div>
  </div>
</template>

<script>
import Checkbox from './../components/form/checkbox.vue'
import Counter from './../components/counter/counter.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
import CommerceProductAlt from '../components/commerce-product-alt.vue'

import appLayout from '../layouts/app.vue'
import defaultLayout from '../layouts/default.vue'
import { Link } from '@inertiajs/inertia-vue'
export default {
  layout: [appLayout, defaultLayout],
  components: {
    Checkbox,
    Counter,
    Carousel,
    CarouselItem,
    CommerceProductAlt,
    Link
  },
  data() {
    return {
      checkboxModel: [],
      quantity: 1,
      carts: [],
      similarProducts: {
        data: []
      },
      loading: false
    }
  },
  computed: {
    getTotal() {
      if (this.checkboxModel.length <= 0) return 0
      let price = 0
      this.checkboxModel.forEach(val => {
        let cart = this.$_.find(this.carts, { id: val })
        let p = cart.productDetail.discount.active == 1 
          ? this.getDiscount(cart.productDetail.price, cart.productDetail.discount)
          : cart.productDetail.price
        price += p * cart.quantity
      });
      return price
    },
    getSaving() {
      if (this.checkboxModel.length <= 0) return 0
      let price = 0
      this.checkboxModel.forEach(val => {
        let cart = this.$_.find(this.carts, { id: val })
        let p = cart.productDetail.discount.active == 1 
          ? this.getDiscount(cart.productDetail.price, cart.productDetail.discount)
          : cart.productDetail.price
        price += cart.productDetail.price - p
      });
      return Math.ceil(price / 1000)
    },
  },
  mounted() {
    this.getCarts()
  },
  methods: {
    checkout() {
      if (this.checkboxModel.length <= 0) {
        this.$helper.alert('Pilih salah satu item terlebih dahulu!')
        return
      }

      this.$openLoading()
      let carts = []

      this.checkboxModel.forEach(val => {
        carts.push({ ...this.$_.find(this.carts, { id: val }) })
      });

      this.$store.dispatch('SET_CHECKOUT', carts)

      this.$closeLoading()
      this.$inertia.visit(this.route('badaso.commerce-theme.checkout'))
    },
    getCarts() {
      this.$api.badasoCart
        .browse()
        .then(res => {
          this.carts = res.data.carts
          if (this.carts.length > 0) {
            this.fetchSimilar(this.$_.take(res.data.carts)[0])
          }
        })
        .catch(err => {
          if (err.status === 401) {
            localStorage.removeItem('token')
            this.$inertia.visit(this.route('badaso.commerce-theme.login'))
          }
          this.$helper.displayErrors(err)
        })
    },
    fetchSimilar(cart) {
      this.$api.badasoProduct
        .browseByCategorySlug({
          slug:  cart.productDetail.product.productCategory.slug
        })
        .then(res => {
          this.similarProducts = res.data.products
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    deleteCart(id) {
      this.$api.badasoCart
        .delete({
          id
        })
        .then(res => {
          this.getCarts()
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    changeQuantity(val, id) {
      if (val && val != 0) {
        this.loading = true
        this.$api.badasoCart
          .edit({
            id,
            quantity: val
          })
          .then(res => {
            this.getCarts()
          })
          .catch(err => {
            this.$helper.displayErrors(err)
          })
          .finally(() => {
            this.loading = false
          })
      }
    },
    getDiscount(price, discount) {
      let d = 0
      if (discount.discountType === 'fixed') {
        d = discount.discountFixed;
      } else {
        d = discount.discountPercent * price / 100
      }
      return parseInt(price - d)
    }
  }
}
</script>