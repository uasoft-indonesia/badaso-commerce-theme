<template>
  <div>
    <commerce-main-banner />
    <div class="commerce-h-spacer" />
    <card>
      <card-header>
        Kategori
      </card-header>
      <card-body color="transparent" no-gutter>
        <carousel show="10" class="container">
          <carousel-item v-for="category, index in splitCategory" :key="index">
            <div class="flex items-start justify-start h-full flex-wrap gap-y-2">
              <router-link v-if="category[0]" :to="{ name: 'Category', params: { slug: category[0].slug } }" class="bg-white h-1/2 rounded-xl block">
                <img :src="category[0].image" alt="" class="rounded-full p-4">
                <div class="pb-4 text-center text-sm">
                  {{ category[0].name }}
                </div>
              </router-link>
              <router-link v-if="category[1]" :to="{ name: 'Category', params: { slug: category[1].slug } }" class="bg-white h-1/2 rounded-xl block">
                <img :src="category[1].image" alt="" class="rounded-full p-4">
                <div class="pb-4 text-center text-sm">
                  {{ category[1].name }}
                </div>
              </router-link>
            </div>
          </carousel-item>
        </carousel>
      </card-body>
    </card>
    <div class="commerce-h-spacer" />
    <card>
      <card-header>
        Pencarian Populer
        <card-action>
          <a href="#" class="capitalize font-normal tracking-normal text-sm inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
            </svg>
            Ubah
          </a>
        </card-action>
      </card-header>
      <card-body color="transparent" no-gutter>
        <carousel show="5" class="container" hide-navigation>
          <carousel-item v-for="index in 5" :key="index">
            <a href="#" class="bg-white rounded-xl flex w-full">
              <div class="flex-1 p-4">
                <div class="text-left text-sm font-semibold">Masker Sensi</div>
                <div class="text-left text-sm">10RB+ Produk</div>
              </div>
              <div class="flex-1 relative p-2 flex items-center">
                <div alt="" class="w-full bg-contain bg-no-repeat rounded-xl" style="background-image: url('https://picsum.photos/320/320'); padding-top: 100%" />
              </div>
            </a>
          </carousel-item>
        </carousel>
      </card-body>
    </card>
    <div class="commerce-h-spacer" />
    <card>
      <card-header text-color="primary">
        Produk Terlaris
        <card-action>
          <a href="#" class="capitalize font-normal tracking-normal text-sm inline-flex items-center">
            Lihat Semua
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
          </a>
        </card-action>
      </card-header>
      <card-body color="transparent" no-gutter>
        <carousel show="6" class="container">
          <carousel-item v-for="index in 24" :key="index">
            <a href="#" class="bg-white rounded-xl flex w-full flex-wrap">
              <div class="w-full relative mb-2 flex items-center">
                <div class="p-2 bg-primary absolute top-0 left-4">
                  <span class="text-sm text-white font-semibold">TOP</span>
                </div>
                <div class="absolute bottom-0 w-full text-center text-white p-1">
                  <span class="z-10 relative">Penjualan / Bulan 55RB+</span>
                  <div class="bg-black opacity-40 w-full top-0 left-0 absolute h-full z-0"></div>
                </div>
                <div class="w-full bg-contain bg-no-repeat rounded-t-xl" style="background-image: url('https://picsum.photos/320/320'); padding-top: 100%" />
              </div>
              <div class="flex-1 px-4 pb-4">
                <div class="text-left text-xl font-semibold">Masker Sensi</div>
              </div>
            </a>
          </carousel-item>
        </carousel>
      </card-body>
    </card>
    <div class="commerce-h-spacer" />
    <card gap="2" class="relative">
      <card-header text-color="primary" class="sticky top-0 z-30">
        Rekomendasi
      </card-header>
      <card-body color="transparent" no-gutter>
        <div class="w-full grid grid-cols-6 gap-2">
          <commerce-product :product="product" v-for="product, index in products.data" :key="index" />
          <div class="commerce-h-spacer col-start-1 col-end-7" />
          <div class="flex col-start-3 col-end-5">
            <router-link :to="{ name: 'ProductList' }" class="bg-white flex justify-center items-center w-full text-sm py-2 border border-gray-300 hover:bg-gray-200 rounded-lg">Lihat Lainnya</router-link>
          </div>
        </div>
      </card-body>
    </card>
  </div>
</template>

<script>
import CommerceMainBanner from './../components/commerce-main-banner.vue'
import Card from '../components/card/card.vue'
import CardHeader from '../components/card/card-header.vue'
import CardAction from '../components/card/card-action.vue'
import CardBody from '../components/card/card-body.vue'
import CommerceProduct from '../components/commerce-product.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
export default {
  components: {
    CommerceMainBanner,
    Card,
    CardHeader,
    CardAction,
    CardBody,
    Carousel,
    CarouselItem,
    CommerceProduct
  },
  computed: {
    splitCategory() {
      return this.$_.chunk(this.productCategories, 2)
    }
  },
  data() {
    return {
      isCategoryHovered: false,
      isItemHovered: false,
      productCategories: [],
      products: {
        data: []
      }
    }
  },
  mounted() {
    this.getCategories()
    this.getProducts()
  },
  methods: {
    getProducts() {
      this.$api.badasoProduct
        .browse()
        .then(res => {
          this.products = res.data.products
        })
        .catch(err => {
          console.error(err);
        })
    },
    getCategories() {
      this.$api.badasoProductCategory
        .browse()
        .then(res => {
          this.productCategories = res.data.productCategories
        })
        .catch(err => {
          console.error(err);
        })
    }
  }
}
</script>

<style lang="scss">
.commerce-h-spacer {
  @apply h-5;
}

.commerce-populer-card {
  &__container {
    @apply flex relative;
  }

  &__item {
    &--wrapper {
      &:not(:last-child) {
        @apply border-r;
      }
      @apply flex-1 border-gray-200;
    }

    &--container {
      @apply border-t border-gray-200 grid grid-cols-5;
    }

    &--image {
      @apply p-2 col-start-4 col-end-6;
    }

    &--text-container {
      @apply col-start-1 col-end-4 p-4;
    }

    &--title {
      @apply text-left text-sm font-semibold;
    }

    &--subtitle {
      @apply text-left text-sm;
    }
  }
}

.commerce-category-card {
  &__container {
    @apply flex relative;
  }

  &__next-button {
    @apply bg-white rounded-full absolute right-0 shadow-lg p-2 translate-x-1/2 transform origin-left border border-gray-200 transition-transform;
    top: 43%;

    &:hover {
      @apply scale-150 transform origin-left;
    }

    &.hovered {
      @apply scale-150 transform origin-left;
    }
  }

  &__item {
    &--wrapper {
      &:not(:last-child) {
        @apply border-r;
      }
      @apply flex-1 border-gray-200;
    }

    &--container {
      @apply border-t border-gray-200 block hover:shadow-lg;
    }

    &--image {
      @apply p-6 rounded-full;
    }

    &--text {
      @apply text-center pb-6 text-sm;
    }
  }
}
</style>