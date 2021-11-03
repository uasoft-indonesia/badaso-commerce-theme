<template>
  <div class="bg-primary">
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
</template>

<script>
import { mapState } from "vuex";
import Password from "./../../components/form/password.vue";
import appLayout from '../../layouts/app.vue'
import authLayout from '../../layouts/auth.vue'
import { Link } from "@inertiajs/inertia-vue"
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
    Link
  },
  data() {
    return {
      name: null,
      username: null,
      email: null,
      password: null,
      passwordConfirmation: null,
      loading: false,
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
    document.title = `Daftar sekarang! - ${this.appName}`;
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
