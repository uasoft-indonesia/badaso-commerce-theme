<template>
  <div class="h-auth sm:h-auto">
    <Head title="Forgot Password" />
    <div class="hidden sm:flex sm:container sm:py-32 items-center justify-center">
      <div class="col-span-1 w-96">
        <template v-if="!isVerify">
          <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
            <div class="text-xl w-full text-center relative">
              <Link :href="route('badaso.commerce-theme.login')" class="absolute left-0 top-1/2 transform -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </Link>
              Forgot Password
            </div>
            <input type="email" class="w-full border border-gray-300 text-sm p-2 focus:outline-none focus:shadow-md focus:border-gray-700 rounded-md mt-4" placeholder="Email" v-model="email" @keypress.enter="reset">
            <button :class="emailButtonClasses" @click="reset">
              <commerce-loading v-if="loading" />
              <span v-else>RESET</span>
            </button>
          </div>
        </template>
        <template v-else>
          <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
            <div class="text-xl w-full text-center relative">
              <Link :href="route('badaso.commerce-theme.login')" class="absolute left-0 top-1/2 transform -translate-y-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
              </Link>
              Verifikasi
            </div>
            <alert color="primary" closeable>
              <template slot="icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </template>
              <span>Silakan cek email kamu untuk mendapatkan kode token</span>
            </alert>
            <pin
              v-model="token"
              :length="6"
              class="mt-4"
              label="Enter your token"
              @keypress.enter="verify"
            />
            <button :class="tokenButtonClasses" @click="verify">
              <commerce-loading v-if="loading" />
              <span v-else>RESET</span>
            </button>
          </div>
        </template>
      </div>
    </div>
    <div class="flex flex-col sm:hidden bg-gray-50 h-auth relative z-0 justify-start pt-4 items-center transform px-4">
      <div class="w-full" v-if="!isVerify">
        <div class="relative w-full">
          <input type="email" class="border-none outline-none w-full py-2 pl-8 pr-6 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Email" v-model="email" ref="email">
          <div class="w-full h-px bg-gray-400 absolute bottom-0" />
          <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500" @click="() => $refs.email.value = null" v-if="email">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
        </div>
        <div :class="['h-10 w-full mt-6 flex items-center justify-center rounded-md', $v.email.$invalid ? 'cursor-none text-gray-500 bg-gray-200 pointer-events-none' : 'bg-primary text-white']" @click="reset">
          Berikutnya
        </div>
      </div>
      <div class="w-full" v-else>
        <div class="relative w-full">
          <input type="text" class="border-none outline-none w-full py-2 pl-8 pr-24 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Kode Verifikasi" v-model="mobileToken" maxlength="6" max="999999">
          <div class="w-full h-px bg-gray-400 absolute bottom-0" />
          <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
            </svg>
          </div>
          <div class="absolute right-1 top-1/2 transform -translate-y-1/2">
            <div :class="['inline-block text-xs border py-1.5 text-center w-24 rounded-md', getCountdown === 0 ? 'bg-primary text-white border-transparent' : 'border-gray-200 text-gray-400 bg-transparent']" @click="sendVerify">
              Kirim Ulang ({{ getCountdown }})
            </div>
          </div>
        </div>
        <div :class="['h-10 w-full mt-6 flex items-center justify-center rounded-md', $v.mobileToken.$invalid ? 'cursor-none text-gray-500 bg-gray-200 pointer-events-none' : 'bg-primary text-white']" @click="mobileVerify">
          Verifikasi
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import Password from './../../components/form/password.vue'
import Pin from "./../../components/form/pin.vue";
import {
  required,
  minLength,
  maxLength,
  email,
} from "vuelidate/lib/validators";

import appLayout from '../../layouts/app.vue'
import authLayout from '../../layouts/auth.vue'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, authLayout],
  components: {
    Password,
    Pin,
    Link,
    Head,
  },
  data() {
    return {
      email: null,
      token: '',
      mobileToken: '',
      countdown: 60,
      loading: false,
      isVerify: false,
      interval: null,
    }
  },
  validations: {
    email: {
      required,
      email,
      minLength: minLength(4),
      maxLength: maxLength(255),
    },
    token: {
      required,
      minLength: minLength(6),
      maxLength: maxLength(6),
    },
    mobileToken: {
      required,
      minLength: minLength(6),
      maxLength: maxLength(6),
    },
  },
  computed: {
    getCountdown() {
      return this.countdown;
    },
    emailButtonClasses() {
      return [
        "w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 select-none flex items-center justify-center gap-2",
        this.$v.email.$invalid || this.loading ? "cursor-not-allowed opacity-50" : "",
      ];
    },
    tokenButtonClasses() {
      return [
        "w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 select-none flex items-center justify-center gap-2",
        this.$v.token.$invalid || this.loading ? "cursor-not-allowed opacity-50" : "",
      ];
    },
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value;
      },
    }),
  },
  mounted() {
    if (this.isAuthenticated) {
      this.$inertia.visit(this.route("badaso.commerce-theme.login"))
    }
  },
  methods: {
    reset() {
      this.loading = true
      this.$api.badasoAuth
        .forgotPassword({
          email: this.email,
        })
        .then((response) => {
          this.isVerify = true;
          // set countdown 60 seconds
          this.interval = setInterval(() => {
            if (this.countdown > 0) {
              this.countdown--;
            } else {
              clearInterval(this.interval);
            }
          }, 1000);
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        })
    },
    sendVerify() {
      this.loading = true
      this.$api.badasoAuth
        .forgotPassword({
          email: this.email,
        })
        .then((response) => {
          this.isVerify = true;
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        })
    },
    verify() {
      this.loading = true
      this.$api.badasoAuth
        .forgotPasswordVerifyToken({
          email: this.email,
          token: this.token,
        })
        .then((response) => {
          this.$inertia.visit(this.route("badaso.commerce-theme.reset-password", {
            email: this.email,
            token: this.token,
          }));
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        })
    },
    mobileVerify() {
      this.loading = true
      this.$api.badasoAuth
        .forgotPasswordVerifyToken({
          email: this.email,
          token: this.mobileToken,
        })
        .then((response) => {
          this.$inertia.visit(this.route("badaso.commerce-theme.reset-password", {
            email: this.email,
            token: this.mobileToken,
          }));
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        })
    },
  }
}
</script>