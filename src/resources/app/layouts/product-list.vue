<template>
  <div>
    <commerce-top-bar class="hidden sm:flex" />
    <commerce-navbar class="hidden sm:flex" />
    <nav class="flex flex-nowrap bg-gray-50 shadow-md px-4 sm:hidden relative z-50 w-full h-14 justify-center items-center">
      <div @click="goBack">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </div>
      <div class="text-lg flex-grow ml-2">{{ $page.props.name }}</div>
      <div class="flex flex-shrink gap-2 flex-nowrap">
        <Link :href="route('badaso.commerce-theme.cart')" class="text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        </Link>
      </div>
    </nav>
    <slot />
    <commerce-footer class="hidden sm:block" />
    <transition
      enter-active-class="transition-all duration-75 ease transform"
      leave-active-class="transition-all duration-75 ease transform"
      enter-class="opacity-50 translate-y-4"
      leave-to-class="opacity-50 translate-y-4"
      leave-class="opacity-100 translate-y-0"
      enter-to-class="opacity-100 translate-y-0"
    >
      <div class="fixed bottom-4 right-4 w-10 h-10 bg-white rounded-full flex justify-center items-center shadow text-primary z-50" @click="scrollToTop" v-if="!isHide">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </div>
    </transition>
  </div>
</template>

<script>
import CommerceTopBar from '../components/commerce-top-bar.vue'
import CommerceNavbar from '../components/commerce-navbar.vue'
import CommerceMobileNavbar from '../components/commerce-mobile-navbar.vue'
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceMobileFooter from '../components/commerce-mobile-footer.vue'
import { Link } from '@inertiajs/inertia-vue'
export default {
  name: "default-layout",
  inject: ['goBack'],
  components: {
    CommerceTopBar,
    CommerceNavbar,
    CommerceMobileNavbar,
    CommerceFooter,
    CommerceMobileFooter,
    Link,
  },
  data() {
    return {
      isHide: false,
    }
  },
  created() {
    window.addEventListener('scroll', this.hideElement)
  },
  destroyed() {
    window.removeEventListener('scroll', this.hideElement)
  },
  methods: {
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      })
    },
    hideElement() {
      window.scrollY > 200 ? this.isHide = false : this.isHide = true
    },
  }
};
</script>