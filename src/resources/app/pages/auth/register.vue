<template>
  <div class="h-auth sm:h-auto">
    <Head title="Register" />
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
        <div class="col-span-1 md:px-0 lg:px-20">
          <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
            <div class="text-xl w-full">Daftar</div>
            <input
              v-model="name"
              type="text"
              class="
                w-full
                text-sm
                border border-gray-300
                p-2
                focus:outline-none
                focus:shadow-md
                focus:border-gray-700
                rounded-md
                mt-4
              "
              placeholder="Name"
            />
            <input
              v-model="username"
              type="text"
              class="
                w-full
                text-sm
                border border-gray-300
                p-2
                focus:outline-none
                focus:shadow-md
                focus:border-gray-700
                rounded-md
                mt-4
              "
              placeholder="Username"
            />
            <input
              v-model="email"
              type="email"
              class="
                w-full
                text-sm
                border border-gray-300
                p-2
                focus:outline-none
                focus:shadow-md
                focus:border-gray-700
                rounded-md
                mt-4
              "
              placeholder="Email"
            />
            <password v-model="password" placeholder="Password" class="mt-4" />
            <password
              v-model="passwordConfirmation"
              placeholder="Confirm Password"
              class="mt-4"
            />
            <button :class="buttonClasses" @click="register">
              <commerce-loading v-if="loading" />
              <span v-else>REGISTER</span>
            </button>
            <div class="flex w-full flex-wrap">
              <div class="text-xs text-center my-4">
                Dengan mendaftar, Anda setuju dengan
                <Link :href="route('badaso.commerce-theme.tos')" class="text-primary cursor-pointer">
                  Syarat, Ketentuan dan Kebijakan dari {{ title }}
                </Link>
                &
                <Link :href="route('badaso.commerce-theme.privacy')" class="text-primary cursor-pointer">
                  Kebijakan Privasi
                </Link>
              </div>
              <div class="text-sm text-gray-300 w-full text-center">
                Punya akun?
                <Link :href="route('badaso.commerce-theme.login')" class="text-primary font-medium cursor-pointer">
                  Log In
                </Link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col sm:hidden bg-gray-50 h-auth relative z-0 justify-start items-center pt-4 px-4">
      <div class="relative w-full">
        <input type="text" class="border-none outline-none w-full py-2 pl-8 pr-6 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Name" v-model="name" ref="name">
        <div class="w-full h-px bg-gray-400 absolute bottom-0" />
        <div class="absolute left-1 top-1/2 transform -translate-y-1/2 text-gray-500">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
          </svg>
        </div>
        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 text-gray-500" @click="() => $refs.name.value = null" v-if="name">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </div>
      </div>
      <div class="relative mt-6 w-full">
        <input type="text" class="border-none outline-none w-full py-2 pl-8 pr-6 focus:outline-none text-sm rounded-md rounded-b-none bg-transparent" placeholder="Username" v-model="username" ref="username">
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
      <div :class="['h-10 w-full mt-6 flex items-center justify-center rounded-md', $v.$invalid ? 'cursor-none text-gray-500 bg-gray-200 pointer-events-none' : 'bg-primary text-white']" @click="register">
        Register
      </div>
      <div class="flex justify-end w-full mt-4">
        <Link :href="route('badaso.commerce-theme.login')" class="text-blue-500 text-sm">Log In</Link>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from "vuex";
import Password from "./../../components/form/password.vue";
import appLayout from '../../layouts/app.vue'
import authLayout from '../../layouts/auth.vue'
import { Link, Head } from "@inertiajs/inertia-vue"
import {
  required,
  minLength,
  maxLength,
  email,
  sameAs,
} from "vuelidate/lib/validators";

export default {
  layout: [appLayout, authLayout],
  components: {
    Password,
    Link,
    Head
  },
  data() {
    return {
      name: null,
      username: null,
      email: null,
      password: null,
      passwordConfirmation: null,
      loading: false,
      showPassword: true,
      showPasswordConfirmation: true,
    };
  },
  validations: {
    name: {
      required,
      minLength: minLength(4),
      maxLength: maxLength(255),
    },
    username: {
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
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value;
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
    }),
  },
  mounted() {
    if (this.isAuthenticated) {
      this.$inertia.visit(this.route('badaso.commerce-theme.home'))
    }
  },
  methods: {
    register() {
      this.loading = true
      this.$api.badasoAuth
        .register({
          name: this.name,
          username: this.username,
          email: this.email,
          password: this.password,
          passwordConfirmation: this.passwordConfirmation,
        })
        .then((response) => {
          this.$inertia.visit(this.route('badaso.commerce-theme.verification', this.email))
        })
        .catch((error) => {
          this.$helper.displayErrors(error)
        })
        .finally(() => {
          this.loading = false
        });
    },
  },
};
</script>
