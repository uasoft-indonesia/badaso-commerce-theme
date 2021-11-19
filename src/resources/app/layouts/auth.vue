<template>
  <div class="h-full">
    <nav class="relative bg-white items-stretch w-full h-20 shadow-md hidden sm:flex">
      <div class="container flex items-center gap-16">
        <div class="flex flex-shrink-0 items-center">
          <Link :href="route('badaso.commerce-theme.home')">
            <commerce-logo dark />
          </Link>
          <div class="text-xl">{{ $page.props.name }}</div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex">
          <div class="flex items-stretch justify-end mx-auto">
            <div class="text-sm text-primary cursor-pointer">Butuh bantuan?</div>
          </div>
        </div>
      </div>
    </nav>
    <nav class="grid grid-cols-8 bg-gray-50 shadow-md px-4 sm:hidden relative z-50 w-full h-12 justify-center items-center">
      <div class="col-span-1" @click="back">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </div>
      <span class="text-lg col-span-4">{{ $page.props.name }}</span>
      <span class="justify-end col-span-3 text-sm text-right">Butuh Bantuan?</span>
    </nav>
    <slot />
    <commerce-footer class="hidden sm:block" no-gutter />
  </div>
</template>

<script>
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceLogo from '../components/commerce-logo.vue'
import { Link } from '@inertiajs/inertia-vue'
export default {
  name: "auth-layout",
  components: {
    CommerceFooter,
    CommerceLogo,
    Link
  },
  methods: {
    back() {
      window.history.back();
    },
  }
};
</script>