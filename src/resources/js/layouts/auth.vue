<template>
  <div>
    <nav class="relative bg-white flex items-stretch w-full h-20 shadow-md">
      <div class="container flex items-center gap-16">
        <div class="flex flex-shrink-0 items-center">
          <router-link :to="{ name: 'Home' }">
            <commerce-logo color="primary" />
          </router-link>
          <div class="text-2xl pt-2">{{ $route.name }}</div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex">
          <div class="flex items-stretch justify-end mx-auto">
            <div class="text-sm text-primary cursor-pointer">Butuh bantuan?</div>
          </div>
        </div>
      </div>
    </nav>
    <router-view />
    <commerce-footer no-gutter />
  </div>
</template>

<script>
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceLogo from '../components/commerce-logo.vue'
export default {
  name: "auth-layout",
  components: {
    CommerceFooter,
    CommerceLogo,
  },
};
</script>