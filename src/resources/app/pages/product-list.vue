<template>
  <div class="container pt-8">
    <div class="h-16 flex items-center justify-center relative">
      <div class="px-4 py-2 rounded-lg bg-primary text-white text-lg font-medium z-10">Semua</div>
      <div class="absolute border-t border-dotted border-black w-full z-0" />
    </div>
    <div class="commerce-h-spacer" />
    <div class="grid grid-cols-6 gap-4 w-full h-full">
      <!-- Sorting -->
      <div class="col-start-1 col-end-7 flex flex-wrap items-start h-max">
        <!-- Items -->
        <div class="w-full py-2 grid grid-cols-6 h-full gap-2">
          <commerce-product :product="product" v-for="product, index in products.data" :key="index" />
        </div>
      </div>
      <div class="commerce-h-spacer" />
      
      <div class="col-span-full">
        <!-- Pagination -->
        <pagination :total="products.total" :per-page="productLimit" v-model="currentPage" />
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import CommerceProduct from '../components/commerce-product.vue'
import Pagination from './../components/pagination/pagination.vue'
export default {
  components: {
    Pagination,
    CommerceProduct
  },
  data() {
    return {
      currentPage: 1,
      products: {
        data: [],
        total: 0
      }
    }
  },
  computed: {
    ...mapState({
      productLimit(state) {
        return parseInt(this.$_.find(state.moduleConfigurations, { key: "homeProductLimit" }).value)
      },
    })
  },
  watch: {
    currentPage: {
      handler(val) {
        this.getProducts()
      }
    }
  },
  mounted() {
    this.getProducts()
  },
  methods: {
    getProducts() {
      this.$api.badasoProduct
        .browse({
          page: this.currentPage
        })
        .then(res => {
          this.products = res.data.products
        })
        .catch(err => {
          console.error(err);
        })
    },
  }
}
</script>