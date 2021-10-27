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
            <router-link
              :to="{ name: 'Forgot Password' }"
              class="text-xs text-primary font-medium"
              >Lupa Password</router-link
            >
            <div class="w-full flex items-center gap-4 my-2">
              <div class="h-px w-full bg-gray-300" />
              <div class="uppercase text-gray-300 text-sm">atau</div>
              <div class="h-px w-full bg-gray-300" />
            </div>
            <div class="text-sm text-gray-300 w-full text-center">
              Baru di {{ title }}?
              <router-link
                :to="{ name: 'Daftar' }"
                class="text-primary font-medium cursor-pointer"
                >Daftar</router-link
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Password from "./../../components/form/password.vue";
import { mapState } from "vuex";
import {
  required,
  minLength,
  maxLength,
  email,
} from "vuelidate/lib/validators";

export default {
  components: {
    Password,
  },
  data() {
    return {
      email: null,
      password: null,
      loading: false,
    };
  },
  validations: {
    password: {
      required,
      minLength: minLength(8),
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
    }),
  },
  mounted() {
    if (this.isAuthenticated) {
      this.$router.push({
        name: "Home"
      }).catch(() => {})
    }

    document.title =
      "Login sekarang untuk mulai berbelanja! - Badaso Commerce Theme";
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
            this.$router.push({ name: "Home" });
            this.$store.dispatch("SET_IS_AUTHENTICATED", true);
            this.$store.dispatch("SET_USER", response.data.user);
            this.$store.dispatch('FETCH_CARTS')
            this.$store.dispatch('FETCH_NOTIFICATIONS')
          } else {
            this.$router.push({
              name: "Verification",
              query: {
                email: this.email,
              },
            });
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