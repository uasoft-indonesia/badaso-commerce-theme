<template>
  <div class="container mt-8">
    <div class="bg-white grid grid-cols-5 gap-8 p-4 shadow-sm rounded-xl">
      <div class="col-start-1 col-end-3 w-full">
        <div class="aspect-w-1 aspect-h-1">
          <img :src="activeImageSource" alt="" class="w-full h-full object-center object-cover cursor-pointer rounded-xl">
        </div>
        <carousel :show="4" class="mt-2" :hide-navigation="product.productDetails.length <= 4" v-if="product.productDetails.length > 0">
          <carousel-item 
            v-for="productDetail, index in product.productDetails" 
            :key="index" 
            no-gutter 
            :class="['cursor-pointer', activeImageCarousel === index ? 'ring-2 ring-primary ring-inset' : '', 'rounded-xl']" 
            :padding="2"
          >
            <img 
              :src="productDetail.productImage" 
              alt="" 
              @mouseenter="activeImageSource = productDetail.productImage; activeImageCarousel = index" 
              @mouseleave="activeImageSource = product.productDetails[active].productImage; activeImageCarousel = active"
              class="rounded-xl"
            >
          </carousel-item>
        </carousel>

      </div>
      <div class="w-full col-start-3 col-end-6">
        <div class="uppercase text-lg font-semibold text-gray-700">{{ product.name }}</div>
        <div class="flex items-center mt-4 flex-nowrap gap-4 text-sm">

          <!-- Rating need to be implemented -->
          <div class="text-primary flex items-center gap-2">
            <span class="underline">{{ rating }}</span>
            <rating stroke v-model="rating" :star-width="16" :star-height="16" star-active-color="rgba(6, 187, 211, 1)" star-empty-color="transparent" />
          </div>
          <div class="h-6 w-px bg-gray-300" />
          <div>
            <span class="underline">525</span> <span class="text-gray-500">Penilaian</span>
          </div>
          <div class="h-6 w-px bg-gray-300" />
          <div>
            10RB+ <span class="text-gray-500">Terjual</span>
          </div>
        </div>
        <div class="mt-4 flex items-center bg-gray-100 gap-2 rounded-xl" v-if="hasActiveDiscount">
          <div class="text-normal text-gray-400 pl-5 py-3 line-through">
            {{ $currency(activePrice) }}
          </div>
          <div class="text-3xl text-primary font-semibold py-3">
            {{ getDiscountedPrice(activePrice, activeDiscount) }}
          </div>
          <div class="flex items-center gap-2 text-white text-xs bg-primary rounded-sm px-1.5 py-0.5 font-bold">
            {{ getDiscount }} OFF
          </div>
        </div>
        <div class="mt-4 flex items-center bg-gray-100 gap-2 rounded-xl" v-else>
          <div class="text-3xl text-primary font-semibold py-3 pl-5">
            {{ $currency(activePrice) }}
          </div>
        </div>
        <div class="p-4 flex flex-wrap text-sm text-gray-500 gap-4">
          <div class="grid grid-cols-6 gap-y-4 items-center w-full">
            <div class="col-span-1">Variasi</div>
            <div class="col-span-5 flex gap-2">
              <div class="px-2.5 py-1.5 text-sm border rounded-md hover:border-primary hover:text-primary cursor-pointer" 
                :class="productDetail.id == selectedProduct.id ? 'text-primary border-primary' : 'text-gray-500 border-gray-300'"
                v-for="productDetail, index in product.productDetails" :key="index"
                @click="clickProductDetail(productDetail, index)"
                @mouseenter="hoverProductDetail(index)"
                @mouseleave="leaveProductDetail(active)"
              >
                {{ $voca.titleCase(productDetail.name) }}
              </div>
            </div>

            <div class="col-span-1">Kuantitas</div>
            <div class="col-span-5 flex items-center gap-4">
              <counter v-model="quantity" :min="1" :max="product.productDetails[active].quantity" />
              Tersisa {{ activeStock }} buah
            </div>
          </div>
          <div class="w-full flex gap-4 items-center">
            <button class="p-3 flex items-center gap-2 border border-primary bg-primary bg-opacity-10 text-primary rounded-md" @click="addToCart">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
              </svg>
              Masukkan Keranjang
            </button>
            <button class="py-3 px-12 flex items-center bg-primary text-white rounded-md hover:brightness-110 filter" @click="buyNow">
              Beli Sekarang
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-5 gap-8 mt-8">
      <div class="flex flex-wrap col-start-1 col-end-5 shadow-sm">
        <div class="bg-white p-6 rounded-xl">
          <div class="w-full bg-gray-100 text-gray-700 font-medium text-lg py-2 px-4 rounded-xl">Spesifikasi Produk</div>
          <div class="mt-2 p-4 grid grid-cols-4 gap-16 text-sm flex-wrap">
            <div class="flex gap-4 flex-wrap col-span-1">
              <div class="text-gray-400 w-full">Kategori</div>
              <div class="text-gray-400 w-full">Stok</div>
            </div>
            <div class="flex gap-4 flex-wrap col-span-3">
              <div class="text-gray-600 w-full">{{ product.productCategory.name }}</div>
              <div class="text-gray-600 w-full">{{ activeStock }}</div>
            </div>
          </div>

          <div class="w-full bg-gray-100 text-gray-700 font-medium text-lg py-2 px-4 rounded-xl">Deskripsi Produk</div>
          <div class="mt-2 p-4 text-sm flex-wrap text-justify">
            {{ product.desc }}
          </div>
        </div>

        <div class="bg-white p-6 mt-8 rounded-xl">
          <div class="text-lg text-gray-700 font-medium w-full">Penilaian Produk</div>
          <div class="grid grid-cols-6 bg-gray-100 border border-gray-200 w-full p-6 gap-8 mt-4 rounded-xl">
            <div class="col-span-1 text-primary flex justify-center flex-wrap gap-2">
              <div class="font-medium flex-1 text-center"><span class="text-2xl">{{ rating }}</span> dari 5</div>
              <rating class="flex-1 justify-center" stroke v-model="rating" :star-width="20" :star-height="20" star-active-color="rgba(6, 187, 211, 1)" star-empty-color="transparent" />
            </div>
            <div class="col-span-5 flex items-center flex-wrap gap-2">
              <button class="py-1 px-6 text-sm text-primary bg-white border border-primary rounded-md">Semua</button>
              <button class="py-1 px-4 text-sm text-black bg-white border border-gray-300 rounded-md">5 Bintang (2)</button>
              <button class="py-1 px-4 text-sm text-black bg-white border border-gray-300 rounded-md">4 Bintang (0)</button>
              <button class="py-1 px-4 text-sm text-black bg-white border border-gray-300 rounded-md">3 Bintang (0)</button>
              <button class="py-1 px-4 text-sm text-black bg-white border border-gray-300 rounded-md">2 Bintang (0)</button>
              <button class="py-1 px-4 text-sm text-black bg-white border border-gray-300 rounded-md">1 Bintang (0)</button>
            </div>
          </div>
          <!-- <div class="flex items-start pl-4 gap-4 flex-wrap mt-4" v-for="index in 3" :key="index">
            <img src="https://picsum.photos/400/320" class="object-center object-cover w-12 h-12 rounded-full">
            <div class="flex-1 flex flex-wrap gap-1 text-sm">
              <div class="text-xs w-full">j*******e</div>
              <rating stroke v-model="rating" :star-width="12" :star-height="12" star-active-color="rgba(6, 187, 211, 1)" star-empty-color="transparent" />
              <div class="w-full text-gray-400">Variasi: Gold</div>
              <div class="text-gray-700 my-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia minima recusandae facere eos assumenda incidunt repudiandae quas omnis veritatis itaque in nulla dicta numquam unde, illo quaerat officiis dolorum sunt nostrum, eum hic maxime accusamus nisi. Ut itaque aperiam asperiores nemo ratione illo repellat soluta impedit facilis accusamus culpa labore atque quidem tempore explicabo suscipit numquam fugiat, reiciendis necessitatibus autem eaque vero similique placeat commodi. Sed dignissimos quibusdam, dolore itaque quis repellendus, obcaecati distinctio temporibus veniam non sunt incidunt perferendis consectetur unde atque aperiam dolorem nulla quidem odit consequuntur excepturi error molestiae. Voluptas dolorem minus cumque, vel nesciunt suscipit ex.</div>
              <div class="text-gray-400 text-xs">2021-07-25 12:54</div>
              <div class="w-full flex gap-2 items-center text-gray-400 mt-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                </svg> {{ index }}
              </div>
            </div>
            <div class="w-full h-px bg-gray-300 my-2" />
          </div>
          <pagination :total="30" :per-page="1" v-model="currentPage" /> -->
        </div>
      </div>
      <div class="flex flex-wrap col-start-5 col-end-auto row-span-2 mb-auto bg-white shadow-sm pt-4 rounded-xl">
        <div class="text-gray-400 text-sm pl-4">Produk Lainnya</div>
        <div class="flex flex-col w-full">
          <router-link :to="{ name: 'DetailProduct', params: { slug: similarProduct.slug } }" v-for="similarProduct, index in similarProducts" :key="index">
            <div class="flex flex-col p-4">
              <div class="aspect-w-15 aspect-h-16">
                <img :src="similarProduct.productImage" :alt="similarProduct.name" class="w-full h-full object-center object-cover">
              </div>
              <div class="line-clamp-2 ml-2 mt-2 mb-1">{{ similarProduct.name }}</div>
              <div class="text-primary ml-2 font-semibold">{{ $currency(similarProduct.productDetails[0].price) }}</div>
            </div>
            <div class="w-full h-px bg-gray-300" v-if="index !== 6" />
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Rating from './../components/rating/rating.vue'
import Counter from './../components/counter/counter.vue'
import Carousel from '../components/carousel/carousel.vue'
import CarouselItem from '../components/carousel/carousel-item.vue'
import Pagination from './../components/pagination/pagination.vue'
export default {
  components: {
    Rating,
    Counter,
    Carousel,
    CarouselItem,
    Pagination,
  },
  data() {
    return {
      rating: 0,
      quantity: 1,
      activeImageCarousel: 0,
      active: 0,
      activeImageSource: null,
      activePrice: 0,
      activeStock: 0,
      activeDiscount: {
        active: false,
        discountFixed: 0,
        discountPercent: 0,
        discountType: 'fixed'
      },
      currentPage: 1,
      selectedProduct: {
        id: null
      },
      product: {
        desc: null,
        name: "",
        productCategory: {
          name: null, 
          slug: null, 
        },
        productDetails: [
          {
            price: null,
            quantity: 0,
            discount: {
              active: false,
              discountFixed: 0,
              discountPercent: 0,
              discountType: 'fixed'
            }
          }
        ],
        productImage: null,
        slug: null,
      },
      similarProducts: []
    }
  },
  computed: {
    hasActiveDiscount() {
      return this.product.productDetails[this.activeImageCarousel].discount.active
    },
    getDiscount() {
      return this.getDiscountType == 'fixed' 
      ? `${Math.round(this.product.productDetails[0].discount.discountFixed/1000)}K`
      : `${this.product.productDetails[0].discount.discountPercent}%`
    },
    getDiscountType() {
      return this.product.productDetails[0].discount.discountType
    },
  },
  watch: {
    $route: {
      handler() {
        this.getProduct()
      },
      deep: true
    },
    "product.name": {
      handler(val) {
        document.title = `${val} - Badaso Commerce Theme`
      }
    }
  },
  mounted() {
    this.getProduct()
  },
  methods: {
    getProduct() {
      this.$api.badasoProduct
        .read({
          slug: this.$route.params.slug
        })
        .then(res => {
          this.product = res.data.product
          this.activeImageSource = res.data.product.productDetails[0].productImage
          this.activePrice = res.data.product.productDetails[0].price
          this.activeStock = res.data.product.productDetails[0].quantity
          this.selectedProduct.id = res.data.product.productDetails[0].id
          this.getSimilarProduct()
        })
        .catch(err => {
          this.$helper.displayErrors(err)
          this.$router.push({
            name: "Page404"
          })
        })
    },
    getSimilarProduct() {
      this.$api.badasoProduct
        .browseSimilar({
          slug:  this.product.productCategory.slug
        })
        .then(res => {
          this.similarProducts = res.data.products
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    getDiscountedPrice(price, discount) {
      let d = 0
      if (discount.discountType === 'fixed') {
        d = discount.discountFixed;
      } else {
        d = discount.discountPercent * price / 100
      }
      return this.$currency(price - d)
    },
    addToCart() {
      if (this.selectedProduct.id === null) {
        this.$helper.alert("You have to select one of the variant!")
        return
      }

      this.$api.badasoCart
        .add({
          id: this.selectedProduct.id,
          quantity: this.quantity
        })
        .then(res => {
          this.$store.dispatch('FETCH_CARTS')
          this.$helper.alert(res.message)
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    buyNow() {
      if (this.selectedProduct.id === null) {
        this.$helper.alert("You have to select one of the variant!")
        return
      }

      this.$api.badasoCart
        .add({
          id: this.selectedProduct.id,
          quantity: this.quantity
        })
        .then(res => {
          this.$store.dispatch('FETCH_CARTS')
          this.$router.push({
            name: "Cart"
          })
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
    },
    clickProductDetail(productDetail, index) {
      this.selectedProduct = productDetail; 
      this.quantity = 1; 
      this.active = index;
      this.activePrice = productDetail.price
      this.activeStock = productDetail.quantity
      this.activeDiscount = productDetail.discount
    },
    hoverProductDetail(index) {
      this.activeImageCarousel = index; 
      this.activeImageSource = this.product.productDetails[index].productImage
      this.activePrice = this.product.productDetails[index].price
      this.activeStock = this.product.productDetails[index].quantity
      this.activeDiscount = this.product.productDetails[index].discount
    },
    leaveProductDetail(active) {
      this.activeImageCarousel = active; 
      this.activeImageSource = this.product.productDetails[active].productImage
      this.activePrice = this.product.productDetails[active].price
      this.activeStock = this.product.productDetails[active].quantity
      this.activeDiscount = this.product.productDetails[active].discount
    }
  }
}
</script>