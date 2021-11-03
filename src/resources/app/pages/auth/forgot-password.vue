<template>
  <div class="flex container py-32 items-center justify-center">
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

export default {
  layout: [appLayout, authLayout],
  components: {
    Password,
    Pin
  },
  data() {
    return {
      email: null,
      token: '',
      loading: false,
      isVerify: false
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
  },
  computed: {
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

    document.title = `Forgot Password - ${this.appName}`
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
    }
  }
}
</script>