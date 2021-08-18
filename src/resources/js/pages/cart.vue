<template>
  <div class="container pt-8 grid gap-4 auto-rows-min">
    <div class="bg-white px-8 py-4 grid grid-cols-8 gap-4 shadow-sm rounded-xl">
      <div class="col-span-4 flex gap-4 items-center">
        <checkbox v-model="checkboxModel" />
        <div class="text-sm text-gray-700 font-medium">Produk</div>
      </div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Harga Satuan</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Kuantitas</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Total Harga</div>
      <div class="col-span-1 text-sm text-gray-700 text-center font-medium">Aksi</div>
    </div>
    <div class="bg-white px-8 py-8 flex shadow-sm rounded-xl flex-wrap gap-4">
      <div class="grid grid-cols-8 gap-4 w-full" v-for="index in 4" :key="index">
        <div class="col-span-4 flex gap-4 items-center">
          <checkbox v-model="checkboxModel" />
          <div class="text-sm text-gray-700 w-24 h-24">
            <img src="https://picsum.photos/320/320" class="w-full h-full">
          </div>
          <div class="line-clamp-2 flex-1 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis impedit culpa voluptatibus ipsam ea quidem, reprehenderit cum fugit nemo voluptates!</div>
        </div>
        <div class="col-span-1 text-sm text-gray-700 text-center flex items-center">
          <span class="line-through text-gray-400">Rp138.000</span>&nbsp;Rp103.000
        </div>
        <div class="col-span-1 text-sm text-gray-700 text-center flex items-center justify-center">
          <counter v-model="quantity" :min="1" />
        </div>
        <div class="col-span-1 text-sm text-primary text-center justify-center flex items-center">
          Rp103.000
        </div>
        <div class="col-span-1 text-sm text-gray-700 text-center flex items-center justify-center">
          <button class="focus:outline-none ring-1 ring-red-500 p-1.5 text-red-500 rounded hover:bg-red-50">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
        <div class="col-span-full" v-if="index !== 4">
          <div class="h-px w-full bg-gray-300" />
        </div>
      </div>
    </div>

    <div class="bg-white px-8 py-4 grid grid-cols-8 gap-4 shadow-sm rounded-xl">
      <div class="col-span-4 flex gap-4 items-center">
        <checkbox v-model="checkboxModel" />
        <div class="text-sm text-gray-700 font-medium">Pilih Semua (4)</div>
      </div>
      <div class="col-span-2 flex flex-wrap items-center justify-end gap-1">
        <div class="flex items-center gap-2">
          Total (4 produk):
          <span class="text-2xl text-primary">Rp412.000</span>
        </div>
        <div class="flex items-center gap-4 text-sm">
          Hemat
          <span class="text-primary">Rp35RB</span>
        </div>
      </div>
      <div class="col-span-2 flex items-center">
        <button @click="checkout" class="font-medium bg-primary text-white p-2 font-sm w-full rounded-md">
          CHECKOUT
        </button>
      </div>
    </div>

    <div class="grid gap-2 w-full mt-8">
      <div class="col-span-1 text-gray-400 font-medium">
        KAMU MUNGKIN JUGA SUKA
      </div>
      <carousel :show="6">
        <carousel-item class="col-span-1" v-for="index in 6" :key="index">
          <router-link :to="{ name: 'DetailProduct', params: { slug: 'lorem-ipsum-dolor-sit-amet' } }" class="relative transition-all ease duration-200 group bg-white ring-primary rounded-xl h-full hover:shadow-md shadow-sm hover:-translate-y-1 transform">
            <div class="w-full bg-contain bg-no-repeat rounded-t-xl mb-2" style="background-image: url('https://picsum.photos/320/320'); padding-top: 100%">
            <div class="absolute right-4 top-0 h-8 w-8">
              <span class="absolute right-0 top-0 text-xs z-10 w-full text-center text-white font-bold line-clamp-2">{{ index }}%<br/>
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
          </router-link>
        </carousel-item>
      </carousel>
    </div>
  </div>
</template>

<script>
import Checkbox from './../components/form/checkbox.vue'
import Counter from './../components/counter/counter.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
export default {
  components: {
    Checkbox,
    Counter,
    Carousel,
    CarouselItem
  },
  data() {
    return {
      checkboxModel: false,
      quantity: 1
    }
  },
  methods: {
    checkout() {
      this.$router.push({ name: 'Checkout' })
    }
  }
}
</script>