  <template>
  <div class="flex container py-32 items-center justify-center">
    <div class="col-span-1 w-96">
      <div class="bg-white rounded-xl p-8 flex flex-wrap gap-2 shadow-md">
        <div class="text-xl w-full text-center relative">
          <router-link :to="{ name: 'Log In' }" class="absolute left-0 top-1/2 transform -translate-y-1/2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
          </router-link>
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
</template>

<script>
import { mapState } from 'vuex';
import Password from './../../components/form/password.vue'
import {
  required,
  minLength,
  maxLength,
  sameAs,
} from "vuelidate/lib/validators";

export default {
  components: {
    Password
  },
  data() {
    return {
      password: null,
      passwordConfirmation: null,
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
  mounted() {
    if (this.isAuthenticated) {
      this.$router.push({
        name: "Home"
      }).catch(() => {})
    }

    document.title = `Reset Password - ${this.appName}`
  },
  methods: {
    reset() {
      this.loading = true
      this.$api.badasoAuth
        .resetPassword({
          email: this.$route.query.email,
          token: this.$route.query.token,
          password: this.password,
          password_confirmation: this.passwordConfirmation,
        })
        .then((response) => {
          setTimeout(() => {
            this.$router.push({ name: "Log In" });
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