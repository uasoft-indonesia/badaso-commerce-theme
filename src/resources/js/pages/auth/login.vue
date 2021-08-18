<template>
  <div class="bg-primary">
    <div class="grid grid-cols-2 container p-12 place-items-center">
      <div class="col-span-1 flex items-start justify-center flex-wrap select-none">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-56 w-56 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
        </svg>
        <div class="w-full text-5xl text-center font-semibold text-white">Badaso<br />Commerce</div>
        <div class="w-full text-2xl text-center text-white mt-12">
          Official Theme for<br/>Badaso Commerce Module
        </div>
      </div>
      <div class="col-span-1 px-20">
        <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
          <div class="text-xl w-full">Log In</div>
          <input type="email" class="w-full border border-gray-300 p-2 focus:outline-none focus:shadow-md focus:border-gray-700 rounded-md mt-4" placeholder="Email">
          <password v-model="password" placeholder="Password" class="mt-4" />
          <button class="w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 opacity-50 cursor-not-allowed">LOG IN</button>
          <div class="flex w-full flex-wrap">
            <router-link :to="{ name: 'Reset Password' }" class="text-xs text-primary font-medium">Lupa Password</router-link>
            <div class="w-full flex items-center gap-4 my-2">
              <div class="h-px w-full bg-gray-300" />
              <div class="uppercase text-gray-300 text-sm">atau</div>
              <div class="h-px w-full bg-gray-300" />
            </div>
            <div class="text-sm text-gray-300 w-full text-center">
              Baru di Shopee? <router-link :to="{ name: 'Daftar' }" class="text-primary font-medium cursor-pointer">Daftar</router-link>
            </div>
          </div>
        </div>
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