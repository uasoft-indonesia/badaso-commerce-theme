<template>
  <div class="h-10 w-full relative flex items-center">
    <input type="text" v-model="keyword" @keypress.enter="searchProduct" class="block w-full h-full focus:outline-none px-3 py-4 rounded-sm border-gray-300 shadow-sm" placeholder="Search anything here">
    <button class="absolute top-0 right-0 bottom-0 bg-primary focus:outline-none px-6 rounded-sm m-0.5" @click="searchProduct">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="white">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  name: "CommerceSearchInput",
  data () {
    return {
      keyword: ""
    }
  },
  mounted() {
    this.keyword = this.$page.props.keyword;
  },
  methods: {
    searchProduct() {
      if (this.keyword.length > 0) {
        this.$inertia.visit(this.route('badaso.commerce-theme.search', {
          keyword: this.keyword
        }))
      }
    }
  }
}
</script>
