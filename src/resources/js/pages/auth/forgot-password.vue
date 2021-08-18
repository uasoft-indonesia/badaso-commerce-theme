<template>
  <div class="flex container py-32 items-center justify-center">
    <div class="col-span-1 w-96">
      <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
        <div class="text-xl w-full text-center relative">
          <router-link :to="{ name: 'Log In' }" class="absolute left-0 top-1/2 transform -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </router-link>
          Reset Password
        </div>
        <input type="email" class="w-full border border-gray-300 p-2 focus:outline-none focus:shadow-md focus:border-gray-700 rounded-md mt-4" placeholder="Email">
        <button class="w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 opacity-50 cursor-not-allowed">BERIKUTNYA</button>
      </div>
    </div>
  </div>
</template>

<script>
import Password from './../../components/form/password.vue'
export default {
  components: {
    Password
  },
  data() {
    return {
      password: null
    }
  },
  mounted() {
    document.title = "Login sekarang untuk mulai berbelanja! - Badaso Commerce Theme"
  }
}
</script>