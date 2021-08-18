<template>
  <div>
    <commerce-top-bar />
    <commerce-navbar />
    <router-view />
    <commerce-footer />
  </div>
</template>

<script>
import CommerceTopBar from '../components/commerce-top-bar.vue'
import CommerceNavbar from '../components/commerce-navbar.vue'
import CommerceFooter from '../components/commerce-footer.vue'
export default {
  name: "default-layout",
  components: {
    CommerceTopBar,
    CommerceNavbar,
    CommerceFooter,
  }
};
</script>