<template>
  <div class="h-auth sm:h-auto">
    <Head title="Login" />
    <div class="bg-primary hidden sm:flex">
      <div class="grid grid-cols-2 container p-12 place-items-center">
        <div
          class="col-span-1 flex items-start justify-center flex-wrap select-none"
        >
          <img :src="logo" class="h-56 w-56" alt="Logo Theme" />
          <div
            class="w-full text-5xl text-center font-semibold text-white mt-2"
            v-html="this.$voca.replace(title, ' ', '<br />')"
          ></div>
          <div class="w-80 text-2xl font-light text-center text-white mt-4">
            {{ subtitle }}
          </div>
        </div>
        <div class="col-span-1 px-20">
          <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
            <div class="text-xl w-full">Log In</div>
            <input
              type="email"
              class="w-full border border-gray-300 py-2 pl-2 pr-8 focus:outline-none mt-4 focus:border-primary text-sm rounded-md"
              placeholder="Email"
              v-model="email"
              @keypress.enter="login"
            />
            <password v-model="password" placeholder="Password" class="mt-4" @keypress.enter="login" />
            <button :class="buttonClasses" @click="login">
              <commerce-loading v-if="loading" />
              <span v-else>LOG IN</span>
            </button>
            <div class="flex w-full flex-wrap">
              <Link :href="route('badaso.commerce-theme.forgot-password')" class="text-xs text-primary font-medium">
                Lupa Password
              </Link>
              <div class="w-full flex items-center gap-4 my-2">
                <div class="h-px w-full bg-gray-300" />
                <div class="uppercase text-gray-300 text-sm">atau</div>
                <div class="h-px w-full bg-gray-300" />
              </div>
              <div class="text-sm text-gray-300 w-full text-center">
                Baru di {{ title }}?
                <Link :href="route('badaso.commerce-theme.register')" class="text-primary font-medium cursor-pointer">
                  Daftar
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col sm:hidden bg-gray-50 h-auth relative z-0 justify-start pt-12 items-center transform px-4">
      <img :src="logo" class="h-16 w-auto" alt="Logo Theme" />
      <div class="relative mt-16 w-full">
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
      <div class="relative mt-6 w-full">
        <input :type="showPassword ? 'password' : 'text'" class="border-none outline-none w-full py-2 pl-8 pr-24 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Password" v-model="password" ref="password">
        <div class="w-full h-px bg-gray-400 absolute bottom-0" />
        <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
          </svg>
        </div>
        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500 flex divide-x">
          <div @click="showPassword = !showPassword">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-if="showPassword" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" v-else fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
          </div>
          <Link :href="route('badaso.commerce-theme.forgot-password')" class="pl-2 text-blue-500 text-sm">Lupa?</Link>
        </div>
      </div>
      <div :class="['h-10 w-full mt-6 flex items-center justify-center rounded-md', $v.$invalid ? 'cursor-none text-gray-500 bg-gray-200 pointer-events-none' : 'bg-primary text-white']" @click="login">
        Log In
      </div>
      <div class="flex justify-end w-full mt-4">
        <Link :href="route('badaso.commerce-theme.register')" class="text-blue-500 text-sm">Daftar</Link>
      </div>
    </div>
  </div>
</template>

<script>
import Password from "./../../components/form/password.vue";
import { mapState } from "vuex";
import { Link, Head } from "@inertiajs/inertia-vue"
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
    Link,
    Head,
  },
  data() {
    return {
      email: null,
      password: null,
      loading: false,
      showPassword: true
    };
  },
  validations: {
    password: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(255),
    },
    email: {
      required,
      email,
      minLength: minLength(4),
      maxLength: maxLength(255),
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
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
      subtitle(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeSubtitle" })
          .value;
      },
      logo(state) {
        return this.$_.find(state.themeConfigurations, { key: "logoTheme" }).value;
      },
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value;
      },
    }),
  },
  mounted() {
    if (this.isAuthenticated) {
      this.$inertia.visit(this.route("badaso.commerce-theme.home"))
    }
  },
  methods: {
    login() {
      this.loading = true
      this.$api.badasoAuth
        .login({
          email: this.email,
          password: this.password,
          remember: this.rememberMe,
        })
        .then((response) => {
          if (response.data.accessToken) {
            this.$inertia.visit(this.route("badaso.commerce-theme.home"))
            this.$store.dispatch("SET_IS_AUTHENTICATED", true);
            this.$store.dispatch("SET_USER", response.data.user);
            this.$store.dispatch('FETCH_CARTS')
            this.$store.dispatch('FETCH_NOTIFICATIONS')
          } else {
            this.$inertia.visit(this.route("badaso.commerce-theme.verification", this.email))
          }
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        })
    },
  },
};
</script>