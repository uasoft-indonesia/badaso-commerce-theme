<template>
  <div :is="component"></div>
</template>

<script>
import defaultLayout from "../layouts/default.vue"
import authLayout from "../layouts/auth.vue"
import cartLayout from "../layouts/cart.vue"

export default {
  name: "App",
  components: {
    defaultLayout,
    authLayout,
    cartLayout
  },
  data() {
    return {}
  },
  methods: {},
  computed: {
    component() {
      return this.$store.state.layout
    }
  },
};
</script>
