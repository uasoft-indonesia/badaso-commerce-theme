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
      <div class="text-lg flex-grow text-center mr-6">{{ $page.props.name }}</div>
    </nav>
    <slot />
    <commerce-footer class="hidden sm:block" />
  </div>
</template>

<script>
import CommerceTopBar from '../components/commerce-top-bar.vue'
import CommerceNavbar from '../components/commerce-navbar.vue'
import CommerceMobileNavbar from '../components/commerce-mobile-navbar.vue'
import CommerceFooter from '../components/commerce-footer.vue'
export default {
  name: "profile-layout",
  inject: ['goBack'],
  components: {
    CommerceTopBar,
    CommerceNavbar,
    CommerceMobileNavbar,
    CommerceFooter,
  },
  methods: {
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth',
      })
    },
  }
};
</script>