<template>
  <div class="w-full h-full hover:shadow-md rounded-xl transition-transform duration-200 ease-in-out transform hover:-translate-y-1" v-if="product.productDetails.length > 0">
    <Link :href="route('badaso.commerce-theme.detail', product.slug)" class="relative block group bg-white rounded-xl h-full" >
      <div class="w-full bg-cover bg-no-repeat rounded-t-xl mb-2" :style="`background-image: url('${product.productImage}'); padding-top: 100%`">
      <div class="absolute right-4 top-0 h-8 w-8" v-if="hasActiveDiscount">
        <span class="absolute right-0 top-0 text-xs z-10 w-full text-center text-white font-bold line-clamp-2">{{ getDiscount }}<br/>
          <span class="text-white font-normal">OFF</span>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 z-0 h-10 absolute top-0 right-0 transform scale-x-125 text-primary" fill="currentColor" viewBox="0 0 10 14">
          <path d="M 0 0 L 10 0 L 10 14 L 5 12 L 0 14 L 0 0 Z"></path>
        </svg>
      </div>
      </div>
      <div class="px-4 pb-4">
        <h3 class="line-clamp-2 text-sm">{{ product.name }}</h3>

        <div class="flex items-start justify-between mt-1">
          <div class="text-primary font-medium">
            {{ getProductPrice }}
          </div>
          <div class="text-xs text-gray-400 mt-1 whitespace-nowrap">
            {{ getProductSold }} Terjual
          </div>
        </div>
        <div class="flex items-start justify-between mt-1">
          <div class="text-primary font-medium">
            <rating stroke v-model.number="product.reviewAvgRating" :star-width="10" :star-height="10" star-active-color="rgba(6, 187, 211, 1)" star-empty-color="transparent" />
          </div>
        </div>
      </div>
    </Link>
  </div>
</template>

<script>
import Rating from './../components/rating/rating.vue'
import { Link } from '@inertiajs/inertia-vue'
export default {
  components: {
    Rating,
    Link
  },
  props: {
    product: {
      required: true
    }
  },
  data() {
    return {
      isHover: false,
    }
  },
  computed: {
    hasActiveDiscount() {
      return this.product.productDetails.length > 0 && this.product.productDetails[0].discount !== null
        ? this.product.productDetails[0].discount.active === 1
        : false
    },
    getDiscountType() {
      return this.product.productDetails.length > 0 && this.product.productDetails[0].discount.discountType
    },
    getDiscount() {
      return this.getDiscountType == 'fixed' 
      ? `${Math.round(this.product.productDetails[0].discount.discountFixed/1000)}K`
      : `${this.product.productDetails[0].discount.discountPercent}%`
    },
    getProductPrice() {
      if (this.product.productDetails.length > 0) {
        let min = this.$_.minBy(this.product.productDetails, 'price')
        let max = this.$_.maxBy(this.product.productDetails, 'price')
        return min == max 
        ? this.$currency(min.price) 
        : `${this.$currency(min.price)} - ${this.$currency(max.price)}`
      }

      return this.$currency(0)
    },
    getProductSold() {
      return this.product.productDetails.reduce((prev, curr) => {
        return prev + parseInt(curr.sold || 0)
      }, 0) || 0;
    }
  }
}
</script>
