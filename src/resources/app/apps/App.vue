<template>
  <div id="app">
    <div :is="component"></div>
    <toast-list />
    <loading />
  </div>
</template>

<script>
import defaultLayout from "../layouts/default.vue"
import authLayout from "../layouts/auth.vue"
import cartLayout from "../layouts/cart.vue"
import legalLayout from "../layouts/legal.vue"
import blankLayout from "../layouts/blank.vue"
import paymentLayout from "../layouts/payment.vue"
import { mapActions, mapState } from 'vuex'
import ToastList from '../components/toast/toast-list.vue'
import Loading from '../components/loading/loading.vue'

export default {
  name: "App",
  components: {
    defaultLayout,
    authLayout,
    cartLayout,
    legalLayout,
    blankLayout,
    paymentLayout,
    ToastList,
    Loading
  },
  data() {
    return {}
  },
  methods: {},
  computed: {
    component() {
      return this.$store.state.layout
    },
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      }
    })
  },
  created() {
    this.$store.dispatch("FETCH_USER");
    this.$closeLoading()
  },
  mounted() {
    this.$store.dispatch("FETCH_THEME_CONFIGURATION");
    if (localStorage.getItem('token')) {
      this.setIsAuthenticated(true)
    } else {
      this.setIsAuthenticated(false)
    }
  },
  methods: {
    ...mapActions({
      setIsAuthenticated: 'SET_IS_AUTHENTICATED'
    })
  }
};
</script>
