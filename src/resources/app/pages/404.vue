<template>
  <div class="text-center py-2">
    <Head :title="$page.props.name" />

    <div class="text-2xl">404 Not Found</div>
    <Link :href="route('badaso.commerce-theme.home')" class="text-primary font-bold">
      [Go Home]
    </Link>
  </div>
</template>

<script>
import appLayout from "../layouts/app.vue";
import categoryLayout from "../layouts/category.vue";
import { Link, Head } from "@inertiajs/inertia-vue";

export default {
  layout: [appLayout, categoryLayout],
  components: {
    Link,
    Head,
  },
};
</script>