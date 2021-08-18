<template>
  <nav class="relative select-none bg-primary flex items-stretch w-full h-20">
    <div class="container flex items-center gap-16 justify-between">
      <router-link class="flex flex-shrink-0 items-center" :to="{ name: 'Home' }">
        <commerce-logo />
      </router-link>
      <div class="items-stretch flex-shrink-0 flex-1 flex-grow;">
        <keep-alive>
          <commerce-search-input />
        </keep-alive>
      </div>
      <div class="flex w-1/12 self-center">
        <div class="flex items-stretch justify-end mx-auto flex-grow-0 flex-shrink-0 relative px-4">
            <div class="block w-full h-full pointer-events-auto relative z-30" @mouseover="dropdownOpen = true">
              <router-link :to="{ name: 'Cart' }" :class="['flex flex-grow-0 flex-shrink-0 relative py-2 px-4 leading-normal text-white no-underline items-center hover:text-gray-300 text-sm']">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.85" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
              </router-link>
            </div>

            <div v-if="dropdownOpen" @mouseover="dropdownOpen = false" class="inset-0 fixed h-full w-full z-10" />

            <transition name="fade">
              <div v-if="dropdownOpen" @mouseover="dropdownOpen = true" class="!absolute right-0 top-5 pt-8 z-20 w-96 overflow-hidden transition-all ease-in-out transform duration-300 origin-top-right">
                <div class="border shadow-xl border-gray-300 bg-white rounded-sm navigation-arrow-top">
                  <div class="p-2">
                    <div class="text-gray-300 text-sm mb-2">Baru ditambahkan</div>
                    <router-link :to="{ name: 'DetailProduct', params: { slug: 'lorem-ipsum-dolor-sit-amet' } }" class="flex items-start px-2 py-4 hover:bg-gray-100 -mx-2" v-for="index in 5" :key="index">
                      <img class="h-10 w-10 object-cover" src="https://picsum.photos/400/320">
                      <p class="text-gray-700 font-medium text-sm mx-2 line-clamp-1 uppercase">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, accusamus!</p>
                      <p class="text-primary text-sm mx-2">Rp103.000</p>
                    </router-link>
                  </div>
                  <div class="flex justify-end m-2">
                    <router-link :to="{ name: 'Cart' }" class="flex px-6 bg-primary text-white text-center text-sm h-8 items-center rounded-md shadow-md -mt-2 filter hover:brightness-110">Tampilkan Keranjang Belanja</router-link>
                  </div>
                </div>
              </div>
            </transition>
          </div>
      </div>
    </div>
  </nav>
</template>

<script>
import CommerceLogo from './commerce-logo.vue'
import CommerceSearchInput from './commerce-search-input.vue'
export default {
  components: {
    CommerceLogo,
    CommerceSearchInput,
  },
  data() {
    return {
      dropdownOpen: true
    }
  }
}
</script>
