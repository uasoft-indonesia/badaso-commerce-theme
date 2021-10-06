<template>
  <div class="bg-white p-8">
    <div class="h-64 w-full grid grid-rows-2 grid-cols-3 gap-1 mx-auto container">
      <div class="col-start-1 col-end-3 row-start-1 row-end-3 rounded-sm">
        <carousel-single autoplay :autoplayDuration="7000" class="rounded-sm h-full">
          <carousel-item-single class="rounded-sm">
            <img class="rounded-sm h-full" src="https://cf.shopee.co.id/file/0f4a438f884e847943891a34b0f40a99_xxhdpi" alt="">
          </carousel-item-single>
          <carousel-item-single class="rounded-sm">
            <img class="rounded-sm h-full" src="https://cf.shopee.co.id/file/4e065fc8d4e69efe6bb05e5dfb8ef553_xxhdpi" alt="">
          </carousel-item-single>
        </carousel-single>
      </div>
      <img class="h-full w-full rounded-sm" src="https://cf.shopee.co.id/file/12b2c01c986971983c6c075d85dc041e_xhdpi" alt="">
      <img class="h-full w-full rounded-sm" src="https://cf.shopee.co.id/file/48d28c9814e4f91e40dcb2de941fef8d_xhdpi" alt="">
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
}
</script>
