<template>
  <div>
    <commerce-top-bar class="hidden sm:flex" />
    <nav class="relative bg-white items-stretch w-full h-20 shadow-md hidden sm:flex">
      <div class="container flex items-center gap-16 justify-between">
        <div class="flex flex-shrink-0 items-center">
          <Link :href="route('badaso.commerce-theme.home')" class="flex flex-nowrap items-center divide-x">
            <commerce-logo dark />
            <div class="text-xl mt-3 pl-4 text-primary">{{ $page.props.name }}</div>
          </Link>
        </div>
        <div class="flex">
          <div class="flex items-stretch justify-end mx-auto w-96">
            <div class="h-10 w-full relative flex items-center">
              <input type="text" v-model="search" @keypress.enter="searchProduct" class="block w-full h-full focus:outline-none px-3 py-4 rounded-sm border-primary border-2" placeholder="Search anything here">
              <button class="absolute top-0 right-0 bottom-0 bg-primary focus:outline-none px-6 rounded-sm" @click="searchProduct">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="white">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <nav class="flex flex-nowrap bg-gray-50 shadow-md px-4 sm:hidden relative z-50 w-full h-14 gap-6 items-center">
      <div @click="goBack">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </div>
      <div class="text-lg text-center mr-6 font-medium">{{ $page.props.name }}</div>
    </nav>

    <slot />
    <commerce-footer class="hidden sm:block" />
  </div>
</template>

<script>
import CommerceTopBar from '../components/commerce-top-bar.vue'
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceLogo from '../components/commerce-logo.vue'
import { Link } from '@inertiajs/inertia-vue'

export default {
  name: "cart-layout",
  inject: ['goBack'],
  components: {
    CommerceTopBar,
    CommerceFooter,
    CommerceLogo,
    Link,
  },
  data() {
    return {
      search: ''
    }
  },
  methods: {
    searchProduct() {
      return
    }
  },
};
</script>