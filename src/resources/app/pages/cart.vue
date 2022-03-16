<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="container pt-8 hidden gap-4 auto-rows-min sm:grid">
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
              <template v-if="cart.productDetail.discount !== null && cart.productDetail.discount.active == 1">
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
              <template v-if="cart.productDetail.discount !== null && cart.productDetail.discount.active == 1">
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
        <carousel class="container hidden lg:flex" show="6">
          <carousel-item v-for="product, index in similarProducts.data" :key="index">
            <commerce-product-alt :product="product" />
          </carousel-item>
        </carousel>
        <carousel class="container hidden md:flex lg:hidden" show="4">
          <carousel-item v-for="product, index in similarProducts.data" :key="index">
            <commerce-product-alt :product="product" />
          </carousel-item>
        </carousel>
      </div>
    </div>

    <div class="block sm:hidden relative">
      <transition
        enter-active-class="transition-all duration-100 ease-out transform"
        leave-active-class="transition-all duration-100 ease-in transform"
        enter-class="opacity-50 translate-y-4"
        leave-to-class="opacity-50 translate-y-4"
        leave-class="opacity-100 translate-y-0"
        enter-to-class="opacity-100 translate-y-0"
      >
        <div class="fixed transform top-1/2 -translate-y-1/2 z-60 px-4" v-if="deleteDialog">
          <div class="bg-white flex justify-center items-center flex-col rounded-md">
            <div class="text-sm text-gray-400 p-4">Yakin untuk menghapus produk dari keranjang?</div>
            <div class="flex flex-row flex-nowrap w-full border-t">
              <div class="w-1/2 py-2.5 text-primary border-r flex justify-center items-center" @click="closeDeleteDialog">Nanti Saja</div>
              <div class="w-1/2 py-2.5 text-primary flex justify-center items-center" @click="deleteCartUsingState">Hapus</div>
            </div>
          </div>
        </div>
      </transition>

      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div key="background" v-if="deleteDialog" class="fixed inset-0 w-screen h-screen bg-black z-50 bg-opacity-50" @click="closeDeleteDialog" />
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
        <div key="background" v-if="variationDialog" class="fixed inset-0 w-screen h-screen bg-black z-80 bg-opacity-50" @click="closeVariationDialog" />
      </transition>

      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-40 translate-y-full"
        enter-to-class="opacity-100 translate-y-0"
        leave-class="opacity-100 translate-y-0"
        leave-to-class="opacity-40 translate-y-full"
      >
        <div key="content" class="fixed bottom-0 p-3 transform origin-bottom right-0 left-0 w-full z-90 bg-white rounded-t-md" v-if="variationDialog">
          <div class="flex flex-col gap-2">

            <div class="w-full flex gap-2 pb-3 border-b">
              <div class="w-1/3">
                <img :src="getImageSource">
              </div>
              <div class="w-2/3 flex flex-col">
                <div class="w-full flex justify-end text-gray-400" @click="closeVariationDialog">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </div>
                <div class="flex-grow" />
                <div v-if="hasActiveDiscount">
                  <div class="text-normal text-gray-400 line-through">
                    {{ $currency(activePrice) }}
                  </div>
                  <div class="text-lg text-primary font-semibold">
                    {{ getDiscountedPrice(activePrice, activeDiscount) }}
                  </div>
                </div>
                <div class="text-lg text-primary font-semibold" v-else>
                  {{ $currency(activePrice) }}
                </div>
                <div class="text-sm text-gray-400">
                  Stok: {{ activeStock }}
                </div>
              </div>
            </div>

            <div class="w-full flex gap-2 flex-col border-b pb-3">
              <div class="text-sm">Variasi</div>

              <div class="w-full flex flex-row flex-wrap gap-4">
                <div v-for="productDetail, index in product.productDetails" :key="index" class="py-1.5 gap-2 rounded-md bg-gray-100 flex items-center px-3" @click="clickProductDetail(index)" :class="[index == productDetailSelectedIndex ? 'border-primary border' : '']">
                  <img :src="productDetail.productImage" class="h-6 w-6">
                  <div class="text-sm">{{ productDetail.name }}</div>
                </div>
              </div>
            </div>

            <div class="w-full flex gap-2 justify-between items-center">
              <div class="text-sm">Jumlah</div>
              <counter v-model="variationQuantity" :min="1" :max="product.productDetails[productDetailSelectedIndex].quantity" />
            </div>

            <div class="w-full flex gap-4 justify-center items-center mt-2">
              <div class="w-full h-10 flex items-center justify-center text-white text-sm rounded-md uppercase py-2 px-4 text-center bg-primary" @click="confirmVariationDialog">Confirmation</div>
            </div>
          </div>
        </div>
      </transition>
    </div>

    <div class="block sm:hidden pb-16">
      <template v-if="carts.length > 0">
        <div class="p-3 grid bg-white grid-cols-12 gap-2 items-center" v-for="cart, index in carts" :key="index">
          <div class="col-span-1 relative">
            <input type="checkbox" v-model="checkboxModel" :id="cart.id" :value="cart.id" class="h-4 w-4 focus:ring-primary focus:outline-none rounded-sm text-primary form-checkbox ">
          </div>
          <div class="col-span-3">
            <img :src="cart.productDetail.productImage" class="w-full h-full">
          </div>
          <div class="col-span-8 flex flex-col gap-3">
            <div class="line-clamp-1 text-sm w-full">
              {{ cart.productDetail.product.name }}
            </div>
            <div class="w-full p-1 bg-gray-100 text-sm flex text-gray-600 items-center" @click="openVariationDialog(cart)">
              <div class="flex-grow">Variasi: {{ cart.productDetail.name }}</div>
              <div class="flex-shrink">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </div>
          </div>
          <div class="text-sm col-start-5 col-end-13">
            <template v-if="cart.productDetail.discount !== null && cart.productDetail.discount.active == 1">
              <span class="line-through text-gray-400">{{ $currency(cart.productDetail.price) }}</span>&nbsp;<span class="text-primary">{{ $currency(getDiscount(cart.productDetail.price, cart.productDetail.discount)) }}</span>
            </template>
            <template v-else>
              <span class="text-gray-700">{{ $currency(cart.productDetail.price) }}</span>
            </template>
            <div class="mt-2">
              <counter @subtract="openDeleteDialog($event, cart, index)" @input="changeQuantity($event, cart.id)" v-model="cart.quantity" text-disabled :disabled="loading" />
            </div>
          </div>
        </div>
      </template>
      <template v-else>
        <div class="p-3 bg-white h-40 w-full flex justify-center gap-2 items-center flex-col text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
          <span class="text-sm">Belum Ada Produk</span>
        </div>
      </template>

      <div class="relative flex justify-center items-center py-4 text-sm text-gray-400">
        <div class="z-10 bg-gray-100 px-4">Kamu Mungkin Juga Suka</div>
        <div class="h-px w-full bg-gray-400 absolute z-0" />
      </div>

      <div class="grid grid-cols-2 px-4 gap-2">
        <commerce-mobile-product-alt :product="product" v-for="product, index in similarProducts.data" :key="index" />
      </div>
    </div>

    <div class="block sm:hidden">
      <div class="fixed bottom-0 left-0 right-0 bg-white grid grid-cols-12 gap-4 items-center px-3 h-12">
        <div class="col-span-3 inline-flex flex-row gap-2 text-xs">
          <input type="checkbox" @input="checkAll" :checked="checkboxModel.length === this.carts.length" class="h-4 w-4 focus:ring-primary focus:outline-none rounded-sm text-primary form-checkbox">
          <div class="line-clamp-1">Pilih Semua</div>
        </div>
        <div class="col-span-5 text-sm">
          <div class="flex items-center gap-4 w-full float-right justify-end">
            Total:
            <span class=" text-primary">{{ $currency(getTotal) }}</span>
          </div>
          <div class="flex items-center gap-2 w-full float-right justify-end" v-if="checkboxModel.length > 0">
            Hemat
            <span class="text-primary">{{ $currency(getSaving) }}RB</span>
          </div>
        </div>
        <div class="col-span-4">
          <button @click="checkout" class="font-medium bg-primary text-white p-2 text-sm w-full rounded-md">
            CHECKOUT
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Checkbox from './../components/form/checkbox.vue'
import Counter from './../components/counter/counter.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
import CommerceProductAlt from '../components/commerce-product-alt.vue'
import CommerceMobileProductAlt from '../components/commerce-mobile-product-alt.vue'

import appLayout from '../layouts/app.vue'
import cartLayout from '../layouts/cart.vue'
import { Link, Head } from '@inertiajs/inertia-vue'
export default {
  layout: [appLayout, cartLayout],
  components: {
    Checkbox,
    Counter,
    Carousel,
    CarouselItem,
    CommerceProductAlt,
    CommerceMobileProductAlt,
    Link,
    Head,
  },
  data() {
    return {
      checkboxModel: [],
      quantity: 1,
      carts: [],
      similarProducts: {
        data: []
      },
      loading: false,
      deleteDialog: false,
      deleteId: null,
      deleteQuantity: null,
      deleteIndex: null,
      variationDialog: false,
      variationId: null,
      variationQuantity: null,
      product: {
        productDetails: []
      },
      productDetailSelectedIndex: 0,
    }
  },
  computed: {
    getTotal() {
      if (this.checkboxModel.length <= 0) return 0
      let price = 0
      this.checkboxModel.forEach(val => {
        let cart = this.$_.find(this.carts, { id: val })
        let p = cart.productDetail.discount !== null && cart.productDetail.discount.active == 1
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
        let p = cart.productDetail.discount !== null && cart.productDetail.discount.active == 1
          ? this.getDiscount(cart.productDetail.price, cart.productDetail.discount)
          : cart.productDetail.price
        price += cart.productDetail.price - p
      });
      return Math.ceil(price / 1000)
    },
    hasActiveDiscount() {
      return this.product.productDetails[this.productDetailSelectedIndex].discount !== null
        ? this.product.productDetails[this.productDetailSelectedIndex].discount.active === 1
        : false
    },
    getImageSource() {
      return this.product.productDetails[this.productDetailSelectedIndex].productImage || null
    },
    activePrice() {
      return this.product.productDetails[this.productDetailSelectedIndex].price || 0
    },
    activeDiscount() {
      return this.product.productDetails[this.productDetailSelectedIndex].discount.active === 1
        ? this.product.productDetails[this.productDetailSelectedIndex].discount
        : null
    },
    activeStock() {
      return this.product.productDetails[this.productDetailSelectedIndex].quantity || 0
    }
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
          localStorage.removeItem('token')
          this.$inertia.visit(this.route('badaso.commerce-theme.login'))
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
    deleteCartUsingState() {
      this.$api.badasoCart
        .delete({
          id: this.deleteId
        })
        .then(res => {
          this.getCarts()
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.deleteDialog = false
        })
    },
    openDeleteDialog($event, { id, quantity }, index) {
      if ($event <= 1) {
        this.deleteDialog = true
        this.deleteId = id
        this.deleteQuantity = quantity
        this.deleteIndex = index
      }
    },
    closeDeleteDialog() {
      this.carts[this.deleteIndex].quantity = this.deleteQuantity
      this.deleteDialog = false
    },
    changeQuantity(val, id) {
      if (val && val > 0) {
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
    },
    checkAll($event) {
      if ($event.target.checked) {
        this.carts.forEach(cart => {
          if (!this.checkboxModel.includes(cart.id)) {
            this.checkboxModel.push(cart.id)
          }
        });
      } else {
        this.checkboxModel = []
      }
    },
    openVariationDialog({ id, quantity, productDetail: { productId }, productDetailId }) {
      this.$api.badasoProduct
        .readByCart({ id: productId })
        .then(res => {
          this.product = res.data.product
          this.variationDialog = true
          this.variationId = id
          this.variationQuantity = quantity
          this.productDetailSelectedIndex = this.product.productDetails.indexOf(this.$_.find(this.product.productDetails, { id: productDetailId }))
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    confirmVariationDialog() {
      this.loading = true
      this.$api.badasoCart
        .editCart({
          id: this.variationId,
          productDetailId: this.product.productDetails[this.productDetailSelectedIndex].id,
          quantity: this.variationQuantity
        })
        .then(res => {
          this.getCarts()
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.loading = false
          this.variationDialog = false
        })
    },
    closeVariationDialog() {
      this.variationDialog = false
    },
    getDiscountedPrice(price, discount) {
      let d = 0
      if (discount.discountType === 'fixed') {
        d = discount.discountFixed;
      } else {
        d = discount.discountPercent * price / 100
      }
      return this.$currency(price - d)
    },
    clickProductDetail(index) {
      this.productDetailSelectedIndex = index
    }
  }
}
</script>
