<template>
  <div class="bg-white p-8">
    <div class="h-64 w-full grid grid-rows-2 grid-cols-3 gap-1 mx-auto container">
      <div class="col-start-1 col-end-3 row-start-1 row-end-3 rounded-sm">
        <carousel-single autoplay :autoplayDuration="7000" class="rounded-sm h-full">
          <carousel-item-single class="rounded-sm" v-for="d, index in banner.mainBanner.data" :key="index">
            <img class="rounded-sm h-full" :src="d.data" alt="">
          </carousel-item-single>
        </carousel-single>
      </div>
      <img class="h-full w-full rounded-sm object-cover" :src="banner.subBanner.data.subBanner1.data" alt="">
      <img class="h-full w-full rounded-sm object-cover" :src="banner.subBanner.data.subBanner2.data" alt="">
    </div>
  </div>
</template>

<script>
import CarouselSingle from './../components/carousel-single/carousel.vue'
import CarouselItemSingle from './../components/carousel-single/carousel-item.vue'
export default {
  components: {
    CarouselSingle,
    CarouselItemSingle
  },
  data() {
    return {
      banner: {
        mainBanner: {
          data: {}
        },
        subBanner: {
          data: {
            subBanner1: {
              data: null
            },
            subBanner2: {
              data: null
            },
          }
        }
      }
    }
  },
  mounted() {
    this.getBanner()
  },
  methods: {
    getBanner() {
      this.$api.badasoContent
        .fetch({
          slug: 'home-banner'
        })
        .then(res => {
          this.banner = res.data.value
        })
        .catch(err => {
          console.error(err);
        })
    }
  }
}
</script>
