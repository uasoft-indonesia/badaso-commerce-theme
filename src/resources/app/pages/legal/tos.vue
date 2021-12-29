<template>
  <div class="flex-grow flex container py-8 flex-wrap">
    <Head :title="$page.props.name" />

    <div class="uppercase text-lg mb-8 font-bold text-gray-700 text-center w-full">Syarat Layanan</div>
    <div v-html="tos" class="tos-content px-6" />

    <fab color="primary" @click="scrollToTop" v-if="!isHide">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18" />
      </svg>
    </fab>
  </div>
</template>

<script>
import Fab from './../../components/fab/fab'
import { mapState } from 'vuex'
import appLayout from '../../layouts/app.vue'
import legalLayout from '../../layouts/legal.vue'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, legalLayout],
  components: {
    Fab,
    Link,
    Head
  },
  computed: mapState({
    tos (state) {
      return _.find(state.themeConfigurations, { key: "tos" }).value
    },
  }),
  methods: {
    scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      })
    }
  },
}
</script>
