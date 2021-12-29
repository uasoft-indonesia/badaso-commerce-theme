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
        <div class="h-22 flex py-4 justify-between items-center border-b">
          <span class="text-lg font-medium text-gray-700">Alamat Saya</span>
          <button class="flex px-4 py-2 bg-primary rounded-md text-white items-center gap-2 text-sm" @click="add">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Tambah Alamat Baru
          </button>
        </div>
        <div class="flex py-6 mb-4 flex-wrap divide-y">
          <template v-if="addresses.length === 0">
            <div class="flex h-32 justify-center items-center w-full flex-col">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-gray-700 text-sm text-center mt-2">No user addresses was found.</span>
            </div>
          </template>
          <template v-else>
            <div v-for="address, index in sortedAddresses" :key="index" class="grid md:grid-cols-4 lg:grid-cols-my-address w-full gap-2 first:pb-6 first:pt-0 last:pb-0 last:pt-6 pb-6 pt-6">
              <div class="grid col-span-1 md:col-span-3 lg:col-span-1 grid-cols-profile-content gap-x-4 gap-y-1 items-center">
                <div class="text-right text-sm text-gray-500">Nama Lengkap</div>
                <div class="font-medium">{{ address.recipientName }} <span v-if="address.isMain == 1" class="hidden first:inline ml-4 text-xs font-medium py-0.5 px-1 bg-gray-500 text-white rounded-md">Utama</span></div>
                <template v-if="address.phoneNumber">
                  <div class="text-right text-sm text-gray-500">Nomor Telephone</div>
                  <div>{{ address.phoneNumber }}</div>
                </template>
                <div class="text-right text-sm text-gray-500 self-start">Alamat</div>
                <div class="leading-tight">	{{ address.addressLine1 }} <br /> <template v-if="address.addressLine2">{{ address.addressLine2 }} <br /></template> {{ address.city }} <br/> {{ getCountryFullText(address.country) }}, {{ address.country }} <br/> {{ address.postalCode }}</div>
              </div>
              <div class="flex items-end flex-col gap-4">
                <div class="flex gap-4">
                  <span class="text-sm underline cursor-pointer text-gray-500" @click="edit(address.id)">Ubah</span>
                  <span class="text-sm underline cursor-pointer text-gray-500" @click="remove(address.id)">Hapus</span>
                </div>
                <button class="py-2 px-3 border rounded-md text-sm text-gray-500" v-if="address.isMain == 0" @click="setToMain(address.id)">
                  Atur Sebagai Utama
                </button>
              </div>
            </div>
          </template>
        </div>
      </div>
    </div>

    <div class="block sm:hidden">
      <div class="w-full flex flex-col gap-3">
        <Link :href="route('badaso.commerce-theme.address-edit', address.id)" v-for="address, index in addresses" :key="index" class="flex w-full bg-white p-3">
          <div class="flex-col flex w-11/12">
            <div class="text-sm font-medium mb-1">{{ address.recipientName }} <span v-if="address.isMain === 1" class="text-primary text-xs">[Utama]</span></div>
            <div class="text-xs text-gray-400">{{ address.phoneNumber }}</div>
            <div class="text-xs text-gray-400">{{ address.addressLine1 }}{{ address.addressLine2 ? `, ${address.addressLine2}` : null }}</div>
            <div class="text-xs text-gray-400">{{ address.city }}{{ address.country ? `, ${address.country}` : null }}{{ address.postalCode ? `, ${address.postalCode}` : null }}</div>
          </div>
          <div class="flex items-end justify-end w-1/12 text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
            </svg>
          </div>
        </Link>

        <Link :href="route('badaso.commerce-theme.address-add')" class="flex justify-between bg-white p-3">
          <div class="text-sm text-gray-400">Tambah alamat baru</div>
          <div class="text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 4v16m8-8H4" />
            </svg>
          </div>
        </Link>
      </div>
    </div>
  </div>
</template>

<script>
import appLayout from '../../layouts/app.vue'
import profilLayout from '../../layouts/profile.vue'
import { mapState } from 'vuex'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, profilLayout],
  components: {
    Link,
    Head
  },
  data() {
    return {
      addresses: []
    }
  },
  computed: {
    sortedAddresses() {
      return this.$_.orderBy(this.addresses, ['isMain'], ['desc'])
    },
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

    this.fetchAddresses()
  },
  methods: {
    add() {
      this.$inertia.visit(this.route('badaso.commerce-theme.address-add'))
    },
    edit(id) {
      this.$inertia.visit(this.route('badaso.commerce-theme.address-edit', id))
    },
    getCountryFullText(country) {
      return this.$_.find(this.countries, { value: country }).text
    },
    fetchAddresses() {
      this.$api.badasoUserAddress.
        browse()
        .then(res => {
          this.addresses = res.data.userAddresses
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    },
    setToMain(id) {
      this.$api.badasoUserAddress
        .setToMain({
          id
        })
        .then(res => {
          this.fetchAddresses()
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    },
    remove(id) {
      this.$api.badasoUserAddress
        .delete({
          id
        })
        .then(res => {
          this.fetchAddresses()
        })
        .catch(error => {
          this.$helper.displayErrors(error)
        })
    }
  }
}
</script>
