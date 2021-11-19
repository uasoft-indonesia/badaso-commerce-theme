<template>
  <div id="app" class="h-full">
    <slot />
    <toast-list class="hidden sm:flex" />
    <toast-list-mobile class="flex sm:hidden" />
    <loading />
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import ToastList from '../components/toast/toast-list.vue'
import ToastListMobile from '../components/toast/toast-list-mobile.vue'
import Loading from '../components/loading/loading.vue'

export default {
  name: "App",
  provide: {
    goBack: () => {
      // this.$inertia.visit(this.$page.props.previous)
      window.history.back()
    }
  },
  components: {
    ToastList,
    ToastListMobile,
    Loading
  },
  data() {
    return {}
  },
  methods: {},
  computed: {
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
