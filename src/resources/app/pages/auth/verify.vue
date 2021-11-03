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
          <div class="text-xl w-full">Verification</div>
          <input
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
            v-model="email"
          />
          <pin
            v-model="token"
            :length="6"
            class="mt-4"
            label="Enter your token"
          />
          <button :class="buttonClasses" @click="verify">
            <commerce-loading v-if="loading" />
            <span v-else>VERIFIY</span>
          </button>
          <div class="flex w-full flex-wrap">
            <Link :href="route('badaso.commerce-theme.forgot-password', $page.props.email)" class="text-xs text-primary font-medium">
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
</template>

<script>
import Password from "./../../components/form/password.vue";
import Pin from "./../../components/form/pin.vue";
import { mapState } from "vuex";
import appLayout from '../../layouts/app.vue'
import authLayout from '../../layouts/auth.vue'
import {
  required,
  minLength,
  maxLength,
  email,
} from "vuelidate/lib/validators";

export default {
  layout: [appLayout, authLayout],
  components: {
    Password,
    Pin,
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
  data() {
    return {
      email: "",
      token: "",
      loading: false
    };
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

    document.title = `Verifikasi Akun - ${this.appName}`;
    this.email = this.$page.props.email;
  },
  methods: {
    verify() {
      this.loading = true
      this.$api.badasoAuth
        .verify({
          email: this.email,
          token: this.token,
        })
        .then((response) => {
          this.$inertia.visit(this.route("badaso.commerce-theme.login"));
        })
        .catch((error) => {
          if (error.message && error.message === "EXPIRED") {
            this.expired = true;
            this.$helper.displayErrors("Verification token expired")
          } else {
            this.$helper.displayErrors(error)

          }
        })
        .finally(() => {
          this.loading = false
        })
    },
  },
};
</script>