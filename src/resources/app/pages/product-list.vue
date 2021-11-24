<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="container pt-8 hidden sm:block">
      <div class="h-16 flex items-center justify-center relative">
        <div class="px-4 py-2 rounded-lg bg-primary text-white text-lg font-medium z-10">Semua</div>
        <div class="absolute border-t border-dotted border-black w-full z-0" />
      </div>
      <div class="h-4 sm:h-5" />
      <div class="grid grid-cols-6 gap-4 w-full h-full">
        <!-- Sorting -->
        <div class="col-start-1 col-end-7 flex flex-wrap items-start h-max">
          <!-- Items -->
          <div class="w-full py-2 grid grid-cols-6 h-full gap-2">
            <commerce-product :product="product" v-for="product, index in products.data" :key="index" />
          </div>
        </div>
        <div class="h-4 sm:h-5" />
        
        <div class="col-span-full">
          <!-- Pagination -->
          <pagination :total="products.total" :per-page="productLimit" v-model="currentPage" />
        </div>
      </div>
    </div>

    <div class="sm:hidden">
      <div class="w-full p-3 grid grid-cols-2 h-full gap-2">
        <commerce-mobile-product :product="product" v-for="product, index in products.data" :key="index" />

        <div class="col-span-full">
          <!-- Pagination -->
          <pagination :total="products.total" :per-page="productLimit" v-model="currentPage" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import CommerceProduct from '../components/commerce-product.vue'
import CommerceMobileProduct from '../components/commerce-mobile-product.vue'
import Pagination from './../components/pagination/pagination.vue'
import appLayout from '../layouts/app.vue'
import productListLayout from '../layouts/product-list.vue'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, productListLayout],
  components: {
    Pagination,
    CommerceProduct,
    CommerceMobileProduct,
    Link,
    Head,
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