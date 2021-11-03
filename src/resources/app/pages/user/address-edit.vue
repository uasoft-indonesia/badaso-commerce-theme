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
      <div class="mt-4 flex items-center gap-y-3 flex-wrap">
        <Link :href="route('badaso.commerce-theme.profile')" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-gray-700 font-semibold group-hover:text-primary transition-colors text-sm pl-2">Akun Saya</span>
        </Link>
        <Link :href="route('badaso.commerce-theme.profile')" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Profil</div>
        </Link>
        <Link :href="route('badaso.commerce-theme.address')" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-primary cursor-pointer text-sm">Alamat</div>
        </Link>
        <Link :href="route('badaso.commerce-theme.change-password')" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Ubah Password</div>
        </Link>
        <Link :href="route('badaso.commerce-theme.order')" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Pesanan Saya</span>
        </Link>
        <Link :href="route('badaso.commerce-theme.notification')" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Notifikasi</span>
        </Link>
      </div>
    </div>
    <div class="bg-white shadow-sm px-6 rounded-xl">
      <div class="h-22 flex py-4 gap-2 items-center border-b">
        <Link class="cursor-pointer" :href="route('badaso.commerce-theme.address')">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
        </Link>
        <span class="text-lg font-medium text-gray-700">Ubah Alamat</span>
      </div>
      <div class="flex py-6 mb-4 flex-wrap gap-y-4">
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Nama Penerima*</label>
          <input v-model="address.recipientName" placeholder="Nama Penerima" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Alamat 1*</label>
          <textarea rows="3" v-model="address.addressLine1" placeholder="Alamat 1" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary"></textarea>
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Alamat 2</label>
          <textarea rows="3" v-model="address.addressLine2" placeholder="Alamat 2" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary"></textarea>
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Negara*</label>
          <vt-select placeholder="Negara" :items="countries" v-model="address.country"></vt-select>
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Kota*</label>
          <input rows="3" v-model="address.city" placeholder="Kota" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Kode Pos*</label>
          <input rows="3" v-model="address.postalCode" placeholder="Kode Pos" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
        </div>
        <div class="flex w-full flex-nowrap gap-4">
          <label class="w-1/6 py-2 text-sm text-right text-gray-500">Nomor Handphone*</label>
          <input rows="3" v-model="address.phoneNumber" placeholder="Nomor Handphone" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
        </div>
        <div class="flex w-full flex-nowrap mt-2">
          <div class="w-1/6"></div>
          <button class="bg-primary font-medium -m-2 px-6 py-2 rounded-md text-white text-sm filter hover:brightness-110" @click="save">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import VtSelect from '../../components/form/select.vue'
import appLayout from '../../layouts/app.vue'
import defaultLayout from '../../layouts/default.vue'
import { Link } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, defaultLayout],
  components: {
    VtSelect,
    Link,
  },
  data() {
    return {
      address: {
        recipientName: null,
        addressLine1: null,
        addressLine2: null,
        city: null,
        postalCode: null,
        country: null,
        phoneNumber: null,
      }
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
  mounted() {
    if (!this.isAuthenticated) {
      this.$inertia.visit(this.route('badaso.commerce-theme.login'))
    }
    this.fetchAddress()
  },
  methods: {
    fetchAddress() {
      this.$api.badasoUserAddress
        .read({
          id: this.$page.props.id
        })
        .then(res => {
          this.address = res.data.userAddress
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    },
    save() {
      this.$api.badasoUserAddress
        .edit({
          ...this.address,
          id: this.$page.props.id
        })
        .then(res => {
          this.$inertia.visit(this.route('badaso.commerce-theme.address'))
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    }
  }
}
</script>
