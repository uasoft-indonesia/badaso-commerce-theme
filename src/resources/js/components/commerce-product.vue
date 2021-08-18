<template>
  <div @mouseenter="isHover = true" @mouseover="isHover = true" @mouseout="isHover = false" class="w-full h-full pointer-events-auto">
    <router-link :to="{ name: 'DetailProduct', params: { slug: 'lorem-ipsum-dolor-sit-amet' } }" class="relative block transition-all ease duration-200 group bg-white ring-primary rounded-xl h-full hover:ring-2 hover:rounded-b-none" >
      <div class="w-full bg-contain bg-no-repeat rounded-t-xl mb-2" :style="`background-image: url('${productImage}'); padding-top: 100%`">
      <div class="absolute right-4 top-0 h-8 w-8">
        <span class="absolute right-0 top-0 text-xs z-10 w-full text-center text-white font-bold line-clamp-2">10%<br/>
          <span class="text-white font-normal">OFF</span>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 z-0 h-10 absolute top-0 right-0 transform scale-x-125 text-primary" fill="currentColor" viewBox="0 0 10 14">
          <path d="M 0 0 L 10 0 L 10 14 L 5 12 L 0 14 L 0 0 Z"></path>
        </svg>
      </div>
      </div>
      <div class="px-4 pb-4">
        <h3 class="line-clamp-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id eveniet expedita voluptas numquam veritatis obcaecati repellat quod fugiat unde impedit?</h3>
        <div class="bg-primary text-white text-xs inline-block border-r border-l border-dotted py-0.5 px-1 my-1">Diskon Rp5RB</div>
        <div class="flex items-end">
          <div class="text-primary font-medium">
            <small class="capitalize">RP</small>
            165.000
          </div>
          <div class="flex-grow" />
          <div class="text-sm text-gray-400">
            30 Terjual
          </div>
        </div>
      </div>
      <transition name="similar-product">
        <div v-if="isHover" class="w-full p-2 font-medium text-sm bg-primary text-white text-center group-hover:ring-2 ring-primary z-20 opacity-0 group-hover:opacity-100 absolute bottom-0 transform translate-y-full rounded-b-xl group-hover:shadow-md">
          Produk Serupa
        </div>
      </transition>
    </router-link>
  </div>
</template>

<script>
export default {
  props: {
    productImage: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      isHover: false
    }
  }
}
</script>

<style lang="scss" scoped>
.similar-product-enter-active, .similar-product-leave-active {
  transition: opacity .2s ease;
}
.similar-product-enter, .similar-product-leave-to {
  opacity: 0;
}
</style>