<template>
  <div class="h-auth sm:h-auto">
    <Head title="Verify" />
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
    <div class="flex flex-col sm:hidden bg-gray-50 h-auth relative z-0 justify-start pt-4 items-center transform px-4">
      <div class="relative mt-8 w-full">
        <div class="text-xs text-gray-400">Mohon verifikasi email anda dengan memasukkan token yang telah dikirimkan ke email anda.</div>
      </div>
      <div class="relative mt-6 w-full">
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
</template>

<script>
import Password from "./../../components/form/password.vue";
import Pin from "./../../components/form/pin.vue";
import { mapState } from "vuex";
import { Link, Head } from "@inertiajs/inertia-vue"
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
    Link,
    Head,
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
  data() {
    return {
      email: "",
      token: "",
      loading: false,
      mobileToken: "",
      countdown: 60,
      interval: null,
    };
  },
  computed: {
    getCountdown() {
      return this.countdown;
    },
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

    this.email = this.$page.props.email;

    // set countdown 60 seconds
    this.interval = setInterval(() => {
      if (this.countdown > 0) {
        this.countdown--;
      } else {
        clearInterval(this.interval);
      }
    }, 1000);
  },
  beforeDestroy() {
    clearInterval(this.interval);
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
          this.$helper.alert("Verifed success")
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
    mobileVerify() {
      this.loading = true
      this.$api.badasoAuth
        .verify({
          email: this.email,
          token: this.mobileToken,
        })
        .then((response) => {
          this.$inertia.visit(this.route("badaso.commerce-theme.login"));
          this.$helper.alert("Verifed success")
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
    sendVerify() {
      if (this.getCountdown === 0) {
        this.loading = true
        this.$api.badasoAuth
          .reRequestVerificationToken({
            email: this.email,
          })
          .then((response) => {
            this.$helper.alert("Verificaiton token has been sent")
          })
          .catch((error) => {
            this.$helper.displayErrors(error)
          })
          .finally(() => {
            this.loading = false
          })
      }
    },
  },
};
</script>