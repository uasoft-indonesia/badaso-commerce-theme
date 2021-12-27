<template>
  <div class="bg-white p-0 sm:p-8">
    <div class="h-40 w-full gap-1 mx-auto container">
      <div class="rounded-sm">
        <carousel-single autoplay :autoplayDuration="7000" class="rounded-sm h-full">
          <carousel-item-single class="rounded-sm" v-for="d, index in bannerSrc" :key="index">
            <img class="rounded-sm h-40 object-cover object-center w-full" :src="d" alt="">
          </carousel-item-single>
        </carousel-single>
      </div>
    </div>
  </div>
</template>

<script>
import CarouselSingle from './carousel-single/carousel.vue'
import CarouselItemSingle from './carousel-single/carousel-item.vue'
export default {
  components: {
    CarouselSingle,
    CarouselItemSingle
  },
  data() {
    return {
      bannerSrc: [],
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
          let value = res.data.value;
          let mainBanner = value.mainBanner.data;
          for (let key in mainBanner) {
            this.bannerSrc.push(mainBanner[key].data)
          }
          this.bannerSrc.push(value.subBanner.data.subBanner1.data)
          this.bannerSrc.push(value.subBanner.data.subBanner2.data)
        })
        .catch(err => {
          console.error(err);
        })
    }
  }
}
</script>
