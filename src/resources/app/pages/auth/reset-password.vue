<template>
  <div class="h-auth sm:h-auto">
    <Head title="Reset Password" />
    <div class="hidden sm:flex sm:container sm:py-32 items-center justify-center">
      <div class="col-span-1 w-96">
        <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
          <div class="text-xl w-full text-center relative">
            <Link :href="route('badaso.commerce-theme.login')" class="absolute left-0 top-1/2 transform -translate-y-1/2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
            </Link>
            Reset Password
          </div>
          <password v-model="password" placeholder="Password" class="mt-4" />
          <password v-model="passwordConfirmation" placeholder="Password Confirmation" class="mt-4" />
          <button :class="buttonClasses" @click="reset">
            <commerce-loading v-if="loading" />
            <span v-else>RESET</span>
          </button>
        </div>
      </div>
    </div>
    <div class="flex flex-col sm:hidden bg-gray-50 h-auth relative z-0 justify-start pt-4 items-center transform px-4">
      <div class="relative mt-6 w-full">
        <input :type="showPassword ? 'password' : 'text'" class="border-none outline-none w-full py-2 pl-8 pr-24 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Password" v-model="password" ref="password">
        <div class="w-full h-px bg-gray-400 absolute bottom-0" />
        <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500 flex">
          <div @click="showPassword = !showPassword">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-if="showPassword" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-else fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
          </div>
        </div>
      </div>
      <div class="relative mt-6 w-full">
        <input :type="showPasswordConfirmation ? 'password' : 'text'" class="border-none outline-none w-full py-2 pl-8 pr-24 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Password Confirmation" v-model="passwordConfirmation" ref="passwordConfirmation">
        <div class="w-full h-px bg-gray-400 absolute bottom-0" />
        <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500 flex">
          <div @click="showPasswordConfirmation = !showPasswordConfirmation">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-if="showPasswordConfirmation" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-else fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
          </div>
        </div>
      </div>
      <div :class="['h-10 w-full mt-6 flex items-center justify-center rounded-md', $v.$invalid ? 'cursor-none text-gray-500 bg-gray-200 pointer-events-none' : 'bg-primary text-white']" @click="reset">
        OK
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import Password from './../../components/form/password.vue'
import appLayout from '../../layouts/app.vue'
import authLayout from '../../layouts/auth.vue'
import { Link, Head } from "@inertiajs/inertia-vue"
import {
  required,
  minLength,
  maxLength,
  sameAs,
} from "vuelidate/lib/validators";

export default {
  layout: [appLayout, authLayout],
  components: {
    Password,
    Link,
    Head,
  },
  data() {
    return {
      password: null,
      passwordConfirmation: null,
      showPassword: true,
      showPasswordConfirmation: true,
      loading: false,
    }
  },
  validations: {
    password: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(255),
    },
    passwordConfirmation: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(255),
      sameAsPassword: sameAs("password"),
    },
  },
  computed: {
    buttonClasses() {
      return [
        "w-full bg-primary text-white py-2 rounded-md text-sm font-medium mt-4 select-none flex items-center justify-center gap-2",
        this.$v.$invalid || this.loading ? "cursor-not-allowed opacity-50" : "",
      ];
    },
    ...mapState({
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value;
      },
      isAuthenticated(state) {
        return state.isAuthenticated
      },
    }),
  },
  methods: {
    reset() {
      this.loading = true
      this.$api.badasoAuth
        .resetPassword({
          email: this.$page.props.email,
          token: this.$page.props.token,
          password: this.password,
          password_confirmation: this.passwordConfirmation,
        })
        .then((response) => {
          this.$helper.alert("Redirect on 5 seconds.")
          setTimeout(() => {
            this.$inertia.visit(this.route('badaso.commerce-theme.login'))
          }, 5000);
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