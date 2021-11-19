<template>
  <div>
    <commerce-top-bar class="hidden sm:flex" />
    <commerce-navbar class="hidden sm:flex" />
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
import CommerceFooter from '../components/commerce-footer.vue'
export default {
  name: "default-layout",
  components: {
    CommerceTopBar,
    CommerceNavbar,
    CommerceFooter,
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