<template>
  <div class="bg-white mt-8 py-3 divide-x grid grid-cols-2 divide-gray-400">
    <Link :href="route('badaso.commerce-theme.privacy')" class="text-center text-xs text-gray-500 uppercase flex justify-center items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
      </svg>
      Kebijakan privasi
    </Link>
    <Link :href="route('badaso.commerce-theme.tos')" class="text-center text-xs text-gray-500 uppercase flex justify-center items-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
      </svg>
      Syarat layanan  
    </Link>
  </div>
</template>

<script>
import { mapState } from 'vuex';
import { Link } from '@inertiajs/inertia-vue'
export default {
  components: { 
    Link
},
  data() {
    return {
      footerData: {
        services: {
          title: "Layanana Pelanggan",
          child: [
            'Bantuan',
          ]
        },
        explore: {
          title: null,
          child: [
            'Tentang Kami',
            'Term of Service',
            'Kebijakan Privasi',
          ]
        },
        payment: {
          title: "Pembayaran",
          child: [
            'Manual Transfer',
          ]
        },
      }
    }
  },
  props: {
    noGutter: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    ...mapState({
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
      facebookUrl(state) {
        return this.$_.find(state.themeConfigurations, { key: "facebookUrl" }).value;
      },
      instagramUrl(state) {
        return this.$_.find(state.themeConfigurations, { key: "instagramUrl" }).value;
      },
      twitterUrl(state) {
        return this.$_.find(state.themeConfigurations, { key: "twitterUrl" }).value;
      },
    }),
  },
  mounted() {
    this.footerData.explore.title = `Jelajahi ${this.title}`
  }
}
</script>