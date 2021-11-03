<template>
  <div>
    404 Not Found
    <button @click="$inertia.visit(this.route('badaso.commerce-theme.home'))">[Go Home]</button>
  </div>
</template>

<script>
import appLayout from '../layouts/app.vue'
import defaultLayout from '../layouts/default.vue'

export default {
  layout: [appLayout, defaultLayout],
}
</script>