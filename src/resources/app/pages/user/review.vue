<template>
  <div class="pt-8 container grid grid-cols-profile">
    <div class="pr-8">
      <div class="h-22 flex items-center border-b">
        <div class="h-16 w-16 items-center justify-center clip-circle">
          <img :src="user.avatar" alt="User's avatar" class="object-cover h-16 w-16">
        </div>
        <div class="inline-block flex-wrap pl-2">
          <div class="text-sm font-medium w-full line-clamp-1 text-gray-700">{{ user.name }}</div>
          <Link :href="route('badaso.commerce-theme.profile')" class="text-sm text-gray-500 w-full flex items-center gap-1 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
            Ubah Profil
          </Link>
        </div>
      </div>
      <div class="mt-4 flex items-center space-y-3 flex-wrap">
        <Link :href="route('badaso.commerce-theme.profile')" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-gray-700 font-semibold group-hover:text-primary transition-colors text-sm pl-2">Akun Saya</span>
        </Link>
        <Link :href="route('badaso.commerce-theme.order')" class="w-full inline-flex items-center group text-primary">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
          <span class="font-semibold cursor-pointer transition-colors text-sm pl-2">Pesanan Saya</span>
        </Link>
        <Link :href="route('badaso.commerce-theme.notification')" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Notifikasi</span>
        </Link>
      </div>
    </div>
    <div class="bg-white shadow-sm px-6 rounded-xl relative flex flex-wrap">
      <div class="h-22 flex flex-col py-4 justify-center border-b w-full">
        <span class="text-lg font-medium text-gray-700">Nilai Produk</span>
      </div>
      <div class="flex flex-wrap mb-6 w-full" v-if="order.orderDetails.length > 0">
        <template v-for="orderDetail, index in order.orderDetails">
          <div :key="index" class="w-full">
            <Link :href="route('badaso.commerce-theme.detail', orderDetail.productDetail.product.slug)" class="flex space-x-4 w-full py-4 items-start" :key="`product-${index}`">
              <img :src="orderDetail.productDetail.productImage" class="border w-20">
              <div class="flex flex-col">
                <div class="text-gray-700">{{ orderDetail.productDetail.product.name }}</div>
                <div class="text-gray-500 text-sm">Variant: {{ orderDetail.productDetail.name }}</div>
                <div class="text-sm text-gray-600">x{{ orderDetail.quantity }}</div>
              </div>
              <div class="flex-grow" />
              <div class="self-center text-primary flex items-center">
                <div class="text-gray-300 mr-2 text-sm line-through" v-if="orderDetail.discounted">{{ $currency(orderDetail.price) }}</div>
                {{ $currency(orderDetail.price - orderDetail.discounted) }}
              </div>
            </Link>
          </div>
          <div :key="`review-${index}`" class="w-full flex-wrap flex gap-4 mb-4">
            <div class="w-full flex flex-wrap gap-2">
              <rating stroke interactable v-model="rating[index]" star-active-color="rgba(6, 187, 211, 1)" star-empty-color="transparent" class="w-2/12" />
              <textarea rows="3" v-model="review[index]" placeholder="Review" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary"></textarea>
              <div class="w-full flex items-start justify-start">
                <label class="inline-flex text-center gap-2 select-none clear-both" :for="`media-${index}`">
                  <template v-for="m, i in media[index]">
                    <img :src="m" v-if="m.match('data:image/*')" class="h-28 w-28 object-cover" :key="`${index}-${i}`">
                    <video v-if="m.match('data:video/*')" class="h-28 w-28" :key="`${index}-${i}`">
                      <source :src="m">
                    </video>
                  </template>
                  <template v-if="media[index].length <= 5">
                    <div class="inline-block w-28 h-28 border-2 border-gray-700 text-gray-700 border-dashed cursor-pointer">
                        <div class="flex justify-center flex-col items-center h-full">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                          </svg>
                          <div class="text-center text-sm">Tambah Media (maks. 5)</div>
                        </div>
                    </div>
                  </template>
                </label>
              </div>
              <input max="5" multiple accept="image/*, video/*" type="file" class="w-full h-full absolute opacity-0 hidden" :name="`media-${index}`" :id="`media-${index}`" ref="filePicker" @change="onFilePicked($event, index)">
            </div>
            <div class="w-1/4 flex flex-col gap-4">
              <button @click="reviewProduct(orderDetail, index)" class="text-sm bg-primary text-white py-2 w-full rounded-md font-medium hover:brightness-90 bg-blend-darken filter">Nilai</button>
            </div>
          </div>
        </template>
      </div>
      <div class="flex w-full flex-col justify-center items-center mb-4 text-primary" v-else>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>Kamu sudah me-<i>review</i> orderan ini.</span>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import Card from '../../components/card/card.vue'
import CardHeader from '../../components/card/card-header.vue'
import CardBody from '../../components/card/card-body.vue'
import Tooltip from '../../components/tooltip/tooltip.vue'
import Radio from './../../components/form/radio.vue'
import Rating from './../../components/rating/rating.vue'
export default {
  components: {
    Radio,
    Tooltip,
    Card,
    CardHeader,
    CardBody,
    Rating
  },
  data() {
    return {
      order: {
        id: null,
        orderDetails: [],
        recipientName: null,
        addressLine1: null,
        addressLine2: null,
        city: null,
        postalCode: null,
        country: null,
        phoneNumber: null,
        discounted: null,
        total: null,
        shippingCost: null,
        payed: null,
        status: null,
        trackingNumber: null,
        message: null,
        cancelMessage: null,
        expiredAt: null,
        createdAt: null,
      },
      review: [],
      rating: [],
      media: [],
    }
  },
  computed: {
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      user(state) {
        return state.user
      },
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
      countries(state) {
        return (JSON.parse(this.$_.find(state.moduleConfigurations, { key: "allowedCountries" }).value)).map((val) => {
          return {
            text: val.name,
            value: val.alpha2Code
          }
        });
      }
    }),
  },
  watch: {
    media: {
      handler() {
        this.$forceUpdate()
      },
    }
  },
  mounted() {
    if (!this.isAuthenticated) {
      this.$inertia.visit(this.route('badaso.commerce-theme.login'))
    }

    this.fetchReview()
  },
  methods: {
    fetchReview() {
      this.$openLoading()
      this.$api.badasoReview
        .read({ id: this.$page.props.id })
        .then(res => {
          if (res.data.order.status !== 'done') {
            this.$inertia.visit(this.route('badaso.commerce-theme.order'))
          }
          res.data.order.orderDetails.forEach(o => {
            this.media.push([])
          })
          this.order = res.data.order
        })
        .catch(err => {
          this.$inertia.visit(this.route('badaso.commerce-theme.order'))
        })
        .finally(() => {
          this.$closeLoading()
        })
    },
    formatStatus(status, expiredAt) {
      switch (status) {
        case 'cancel':
          return 'Gagal'
        case 'waitingBuyerPayment':
          return 'Menunggu Pembayaran'
        case 'waitingSellerConfirmation':
          return 'Menunggu Konfirmasi Penjual'
        case 'process':
          return 'Sedang Diproses'
        case 'delivering':
          return 'Sedang Dikirim'
        case 'done':
          return 'Selesai'
        default:
          break;
      }
    },
    getCountryFullText(country) {
      if (!country) return null
      return this.$_.find(this.countries, { value: country }).text
    },
    onFilePicked(e, index) {
      const files = e.target.files;
      this.$set(this.media, index, [])
      if (Array.from(files).length > 5) {
        this.$helper.alert("Max only 5 media")
        return;
      }

      Array.from(files).forEach(file => {
        const fileSize = Math.round((file.size / 1024))
        if (file !== undefined) {
          if (fileSize > 8192) {
            this.$helper.alert("Maksimal ukuran gambar adalah 2MB!")
            return;
          }

          if (file.type.match('image.*') || file.type.match('video.*')) {
            const fileReader = new FileReader()

            fileReader.readAsDataURL(file)
            fileReader.onload = () => {
              this.media[index].push(fileReader.result)
            }
            fileReader.onerror = (error) => {
              this.$alert(error)
            };
          } else {
            this.$helper.alert('Invalid mimetypes')
            return;
          }
        }
      })

      return;
    },
    reviewProduct(orderDetail, index) {
      this.$openLoading()
      this.$api.badasoReview
        .submit({
          id: orderDetail.id,
          rating: this.rating[index],
          review: this.review[index],
          media: this.media[index],
        })
        .then(res => {
          this.rating.splice(index, 1)
          this.review.splice(index, 1)
          this.media.splice(index, 1)

          this.fetchReview()
        })
        .catch(err => {
          this.$helper.displayErrors(err)
        })
        .finally(() => {
          this.$closeLoading()
        })
    }
  }
}
</script>
