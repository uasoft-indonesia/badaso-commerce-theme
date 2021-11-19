<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="pt-8 container sm:grid grid-cols-profile hidden">
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

    <div class="sm:hidden relative">
      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-0"
        enter-to-class="opacity-100"
        leave-class="opacity-100"
        leave-to-class="opacity-0"
      >
        <div key="background" v-if="countryDialog" class="fixed inset-0 w-screen h-screen bg-black z-80 bg-opacity-50" @click="closeCountryDialog" />
      </transition>

      <transition
        enter-active-class="transition-all ease-out duration-100"
        leave-active-class="transition-all ease-in duration-100"
        enter-class="opacity-40 translate-y-full"
        enter-to-class="opacity-100 translate-y-0"
        leave-class="opacity-100 translate-y-0"
        leave-to-class="opacity-40 translate-y-full"
      >
        <div key="content" class="fixed bottom-0 p-3 transform origin-bottom right-0 left-0 w-full z-90 bg-white rounded-t-md overflow-y-scroll max-h-screen" v-if="countryDialog">
          <div class="inline-flex gap-2 divide-y flex-wrap">
            <div v-for="country, index in countries" :key="index" class="pt-4 pb-2 w-full" @click="setCountryValue(country.value)">
              {{ country.text }}
            </div>
          </div>
        </div>
      </transition>
    </div>

    <div class="block sm:hidden">
      <div class="flex w-full flex-col bg-white py-2">
        <div class="border-b pb-1">
          <div class="text-xs text-gray-500 font-medium px-3 mb-2">Kontak</div>
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Nama Lengkap" v-model="address.recipientName">
        </div>

        <div class="py-1">
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Nomor Telepon" v-model="address.phoneNumber">
        </div>

        <div class="border-b pb-1 pt-3">
          <div class="text-xs text-gray-500 font-medium px-3 mb-2">Alamat</div>
          <label class="text-sm px-3 flex justify-between py-2" @click="openCountryDialog" :class="[address.country ? '' : 'text-gray-400']">
            {{ address.country ? showCountryText(address.country) : 'Negara' }}
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5l7 7-7 7" />
            </svg>
          </label>
        </div>

        <div class="py-1 border-b">
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Alamat 1" v-model="address.addressLine1">
        </div>

        <div class="py-1 border-b">
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Alamat 2" v-model="address.addressLine2">
        </div>

        <div class="py-1 border-b">
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Kota" v-model="address.city">
        </div>

        <div class="pt-1">
          <input type="text" class="py-2 outline-none text-sm px-3 w-full" placeholder="Kode Pos" v-model="address.postalCode">
        </div>

        <div class="border-b pb-1 pt-3">
          <div class="text-xs text-gray-500 font-medium px-3 mb-2">Pengaturan</div>
          <div class="flex justify-between w-full px-3">
            <label class="text-sm text-gray-600">Atur sebagai Alamat Utama</label>
            <vt-switch type="text" class="py-2 outline-none text-sm" placeholder="Nama Lengkap" v-model="address.isMain" />
          </div>
        </div>

        <div class="p-3 pb-1">
          <div class="bg-primary w-full text-white text-center py-2 text-sm rounded-md" @click="saveMobile">Kirim</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
import VtSelect from '../../components/form/select.vue'
import VtSwitch from '../../components/form/switch.vue'
import appLayout from '../../layouts/app.vue'
import profileLayout from '../../layouts/profile.vue'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, profileLayout],
  components: {
    VtSelect,
    VtSwitch,
    Link,
    Head,
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
      },
      countryDialog: false
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
    openCountryDialog() {
      this.countryDialog = true
    },
    closeCountryDialog() {
      this.countryDialog = false
    },
    setCountryValue(value) {
      this.address.country = value
      this.closeCountryDialog()
    },
    showCountryText(value) {
      return this.$_.find(this.countries, { value: value }).text
    },
    setToMain(id) {
      this.$api.badasoUserAddress
        .setToMain({
          id
        })
        .then(res => {
          this.$inertia.visit(this.route('badaso.commerce-theme.address'))
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    },
    fetchAddress() {
      this.$api.badasoUserAddress
        .read({
          id: this.$page.props.id
        })
        .then(res => {
          this.address = res.data.userAddress
          this.address.isMain = res.data.userAddress.isMain === 0 ? false : true
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    },
    saveMobile() {
      this.$api.badasoUserAddress
        .edit({
          ...this.address,
          id: this.$page.props.id
        })
        .then(res => {
          this.setToMain(this.$page.props.id)
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
