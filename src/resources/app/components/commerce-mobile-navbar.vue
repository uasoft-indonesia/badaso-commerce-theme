<template>
  <nav class="fixed z-30 right-8 left-8 top-4 select-none flex w-full h-20">
    <div class="h-10 w-full relative flex items-center">
      <div class="absolute inset-2 text-primary">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>
      <input
        type="text"
        v-model="search"
        @keypress.enter="searchProduct"
        class="
          block
          w-full
          h-full
          focus:outline-none
          px-3
          py-4
          rounded-sm
          border-gray-300
        "
        placeholder="Search anything here"
      />
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
};
</script>
