<template>
  <nav class="block px-4 top-2 select-none bg-white w-full py-3">
    <div class="h-10 w-full relative flex items-center gap-3">
      <div class="text-primary flex flex-row items-end" @click="goBack">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
      </div>
      <div class="relative flex items-center h-10">
        <div class="absolute left-2 text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input
          type="text"
          v-model="search"
          @keypress.enter="searchProduct"
          class="block w-full h-full focus:outline-none pr-3 pl-9 py-4 rounded-sm bg-gray-100 text-sm"
          placeholder="Search anything here"
        />
      </div>
      <div class="text-primary flex flex-row items-end">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
        </svg>
        <span class="text-primary text-xs">Filter</span>
      </div>
    </div>
  </nav>
</template>

<script>
import { mapState } from "vuex";
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Link,
  },
  mounted() {
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
