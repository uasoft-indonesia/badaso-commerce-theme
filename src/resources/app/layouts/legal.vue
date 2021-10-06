<template>
  <div class="flex flex-wrap">
    <nav class="relative bg-white flex items-stretch w-full h-20 shadow-md">
      <div class="container flex items-center gap-16">
        <div class="flex flex-shrink-0 items-center">
          <router-link :to="{ name: 'Home' }">
            <commerce-logo color="primary" />
          </router-link>
        </div>
        <div class="flex-grow"></div>
        <div class="flex">
          <div class="flex items-stretch justify-end mx-auto">
            <div class="text-sm cursor-pointer">
              <svg class="h-6 w-6 text-primary" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <title>Facebook</title>
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="currentColor"/>
              </svg>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <router-view />
    <div class="bg-gray-300 h-16 border-primary w-full">
      <div class="w-full flex text-gray-500 text-sm items-center h-full px-8">
        <div class="flex gap-4">
          <div class="text-lg text-white">Help</div>
          <div class="text-lg text-white">Kebijakan Shopee</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceLogo from '../components/commerce-logo.vue'
export default {
  name: "legal-layout",
  components: {
    CommerceFooter,
    CommerceLogo,
  },
};
</script>