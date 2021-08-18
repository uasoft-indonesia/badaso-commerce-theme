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
          <div class="text-xl w-full">Daftar</div>
          <input type="text" class="w-full border border-gray-300 p-2 focus:outline-none focus:shadow-md focus:border-gray-700 rounded-md mt-4" placeholder="Name">
          <input type="email" class="w-full border border-gray-300 p-2 focus:outline-none focus:shadow-md focus:border-gray-700 rounded-md mt-4" placeholder="Email">
          <password v-model="password" placeholder="Password" class="mt-4" />
          <password v-model="passwordConfirmation" placeholder="Confirm Password" class="mt-4" />
          <button class="w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 opacity-50 cursor-not-allowed">LOG IN</button>
          <div class="flex w-full flex-wrap">
            <div class="text-xs text-center my-4">
              Dengan mendaftar, Anda setuju dengan <span class="text-primary cursor-pointer">Syarat, Ketentuan dan Kebijakan dari Shopee</span> & <span class="text-primary cursor-pointer">Kebijakan Privasi</span>
            </div>
            <div class="text-sm text-gray-300 w-full text-center">
              Punya akun? <router-link :to="{ name: 'Log In' }" class="text-primary font-medium cursor-pointer">Log In</router-link>
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
      password: null,
      passwordConfirmation: null
    }
  },
  mounted() {
    document.title = "Daftar sekarang! - Badaso Commerce Theme"
  }
}
</script>
