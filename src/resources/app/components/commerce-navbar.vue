<template>
  <nav class="relative select-none bg-primary flex items-stretch w-full h-20">
    <div class="container flex items-center gap-16 justify-between">
      <Link class="flex flex-shrink-0 items-center" :href="route('badaso.commerce-theme.home')">
        <commerce-logo />
      </Link>
      <div class="items-stretch flex-shrink-0 flex-1 flex-grow;">
        <keep-alive>
          <commerce-search-input />
        </keep-alive>
      </div>
      <div class="flex w-1/12 self-center">
        <div class="flex items-stretch justify-end mx-auto flex-grow-0 flex-shrink-0 relative px-4">
            <div class="block w-full h-full pointer-events-auto relative z-30" @mouseover="dropdownOpen = true">
              <template v-if="isAuthenticated">
                <Link :href="route('badaso.commerce-theme.cart')" :class="['flex flex-grow-0 flex-shrink-0 relative md:px-0 lg:py-2 lg:px-4 leading-normal text-white no-underline items-center hover:text-gray-300 text-sm']">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.85" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </Link>
              </template>
              <template v-else>
                <Link :href="route('badaso.commerce-theme.login')" :class="['flex flex-grow-0 flex-shrink-0 relative md:px-0 lg:py-2 lg:px-4 leading-normal text-white no-underline items-center hover:text-gray-300 text-sm']">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.85" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                </Link>
              </template>
            </div>

            <div v-if="dropdownOpen" @mouseover="dropdownOpen = false" class="inset-0 fixed h-full w-full z-10" />

            <transition name="fade">
              <div v-if="dropdownOpen" @mouseover="dropdownOpen = true" class="!absolute right-0 top-5 pt-8 z-20 w-96 overflow-hidden transition-all ease-in-out transform duration-300 origin-top-right">
                <div class="border shadow-xl border-gray-300 bg-white rounded-sm navigation-arrow-top">
                  <template v-if="isAuthenticated && carts.length > 0">
                    <div class="p-2">
                      <div class="text-gray-300 text-sm mb-2">Baru ditambahkan</div>
                      <Link :href="route('badaso.commerce-theme.detail', cart.productDetail.product.slug)" class="flex items-start px-2 py-4 hover:bg-gray-100 -mx-2" v-for="cart, index in carts" :key="index">
                        <img class="h-10 w-10 object-cover" :src="cart.productDetail.productImage">
                        <p class="text-gray-700 font-medium text-sm mx-2 line-clamp-1 uppercase">{{ cart.productDetail.product.name }}</p>
                        <p class="text-primary text-sm mx-2">{{ $currency(cart.productDetail.price) }}</p>
                      </Link>
                    </div>
                    <div class="flex justify-end m-2">
                      <Link :href="route('badaso.commerce-theme.cart')" class="flex px-6 bg-primary text-white text-center text-sm h-8 items-center rounded-md shadow-md -mt-2 filter hover:brightness-110">Tampilkan Keranjang Belanja</Link>
                    </div>
                  </template>
                  <template v-else>
                    <div class="p-2 h-40 flex justify-center gap-2 items-center flex-col text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                      </svg>
                      <span class="text-sm">Belum Ada Produk</span>
                    </div>
                  </template>
                </div>
              </div>
            </transition>
          </div>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapState } from 'vuex'
import { Link } from '@inertiajs/inertia-vue'
import CommerceLogo from './commerce-logo.vue'
import CommerceSearchInput from './commerce-search-input.vue'
export default {
  components: {
    CommerceLogo,
    CommerceSearchInput,
    Link
  },
  data() {
    return {
      dropdownOpen: false
    }
  },
  computed: {
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      carts(state) {
        return state.carts
      }
    })
  },
}
</script>
