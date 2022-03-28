<template>
  <nav class="absolute z-30 pl-8 pr-8 top-2 select-none block w-full">
    <div class="h-10 w-full relative flex items-center gap-3">
      <div class="relative flex items-center h-10 flex-grow">
        <div class="absolute left-2 text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input
          type="text"
          v-model="keyword"
          @keypress.enter="searchProduct"
          class="block w-full h-full focus:outline-none pr-3 pl-9 py-4 rounded-sm"
          placeholder="Search anything here"
        />
      </div>
      <div class="gap-3 flex">
        <Link :href="route('badaso.commerce-theme.cart')" class="text-white block">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </Link>
        <Link :href="isAuthenticated ? route('badaso.commerce-theme.profile') : route('badaso.commerce-theme.login')" class="text-white block">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </Link>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapState } from "vuex";
import { Link } from "@inertiajs/inertia-vue";
import CommerceLogo from "./commerce-logo.vue";
import CommerceSearchInput from "./commerce-search-input.vue";
export default {
  components: {
    CommerceLogo,
    CommerceSearchInput,
    Link,
  },
  data() {
    return {
      dropdownOpen: false,
      search: '',
      keyword: null,
    };
  },
  computed: {
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated;
      },
      carts(state) {
        return state.carts;
      },
    }),
  },
    beforeRouteEnter(to, from, next) {
            next((vm) => {
                document.title = `Pencarian ${vm.$voca.titleCase(vm.$page.props.keyword, true)} - Badaso Commerce Theme`;
            });
        },
         mounted(){
            this.keyword = this.$page.props.keyword;

         },
  methods: {
      setQueryParams(){
        this.keyword = this.$page.props.keyword;

      },
    searchProduct() {
      if (this.search) {
        this.$inertia.visit(this.route('badaso.commerce-theme.search', this.search))
      }
      if (this.keyword.length > 0) {
        this.$inertia.visit(this.route('badaso.commerce-theme.search', {
          keyword: this.keyword
        }))
      }
    }
  }
};
</script>
