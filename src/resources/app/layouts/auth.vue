<template>
  <div>
    <nav class="relative bg-white flex items-stretch w-full h-20 shadow-md">
      <div class="container flex items-center gap-16">
        <div class="flex flex-shrink-0 items-center">
          <Link :href="route('badaso.commerce-theme.home')">
            <commerce-logo dark />
          </Link>
          <div class="text-2xl">{{ $page.props.name }}</div>
        </div>
        <div class="flex-grow"></div>
        <div class="flex">
          <div class="flex items-stretch justify-end mx-auto">
            <div class="text-sm text-primary cursor-pointer">Butuh bantuan?</div>
          </div>
        </div>
      </div>
    </nav>
    <slot />
    <commerce-footer no-gutter />
  </div>
</template>

<script>
import CommerceFooter from '../components/commerce-footer.vue'
import CommerceLogo from '../components/commerce-logo.vue'
import { Link } from '@inertiajs/inertia-vue'
export default {
  name: "auth-layout",
  components: {
    CommerceFooter,
    CommerceLogo,
    Link
  },
};
</script>