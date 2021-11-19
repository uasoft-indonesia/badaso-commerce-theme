<template>
  <div>
    <Head :title="$page.props.name" />

    <div class="hidden sm:block">
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
              <div class="col-start-2 col-end-3 text-primary cursor-pointer text-sm">Profil</div>
            </Link>
            <Link :href="route('badaso.commerce-theme.address')" class="w-full inline-flex items-center ml-10 group">
              <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Alamat</div>
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
          <div class="h-22 flex flex-col py-4 justify-center border-b">
            <span class="text-lg font-medium text-gray-700">Profil Saya</span>
            <span class="text-sm text-gray-500">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</span>
          </div>
          <div class="grid grid-cols-3 p-6 mb-4 items-start">
            <div class="col-span-2 grid grid-cols-profile-content gap-x-6 pr-4 content-center items-center">
              <div class="text-sm text-right text-gray-500 mb-4">Nama</div>
              <div class="flex-1 mb-4">
                <input v-model="name" type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
              </div>
              <div class="text-sm text-right text-gray-500 mb-4">Email</div>
              <div class="flex-1 mb-4">
                <input v-model="email" disabled type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary disabled:bg-gray-100 disabled:text-gray-300 disabled:shadow-none disabled:cursor-not-allowed">
              </div>
              <div class="col-start-2 col-end-3 mt-2">
                <button class="bg-primary font-medium px-6 py-2 rounded-md text-white text-sm filter hover:brightness-110" @click="save">Simpan</button>
              </div>
            </div>
            <div class="flex flex-col justify-start col-span-1 p-8 items-center border-l ml-4">
              <div class="h-24 w-24 bg-gray-300 flex rounded-full items-center justify-center clip-circle">
                <template v-if="user.avatar">
                  <img :src="avatar ? avatar : user.avatar" alt="User's avatar" class="object-cover h-24 w-24">
                </template>
                <template v-else>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-full text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                  </svg>
                </template>
              </div>
              <input type="file" @change="filesChange" accept="image/png, image/jpeg" ref="file" class="hidden">
              <button @click="$refs.file.click()" class="px-6 py-2 text-sm bg-white border mt-4 mb-2 rounded-md hover:bg-gray-50">
                Pilih Gambar
              </button>
              <span class="text-sm text-gray-400">Ukuran gambar: maks. 2 MB</span>
              <span class="text-sm text-gray-400">Format gambar: .JPEG, .PNG</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="block sm:hidden">
      <div class="h-36 flex flex-col p-4 bg-primary">
        <Link :href="route('badaso.commerce-theme.cart')" class="w-full flex justify-end text-white flex-shrink">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </Link>
        <div class="flex-grow h-14"></div>
        <div class="w-full flex text-white flex-shrink gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
          </svg>
          <div class="flex flex-col justify-center">
            <div class="text-sm font-bold">{{ user.name }}</div>
            <div class="text-xs">{{ user.email }}</div>
          </div>
        </div>
      </div>

      <div class="mt-2 bg-white flex flex-col">
        <Link :href="route('badaso.commerce-theme.order')" class="h-10 px-4 flex items-center border-b border-gray-200 gap-2 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
          </svg>
          Pesanan Saya
          <div class="flex-grow" />
          <div class="flex items-center justify-center gap-1">
            <span class="text-xs">Lihat riwayat pesanan</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
        </Link>
      </div>

      <div class="mt-2 bg-white flex flex-col">
        <Link :href="route('badaso.commerce-theme.address')" class="h-10 px-4 flex items-center gap-2 text-sm border-b">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
          </svg>
          Alamat
          <div class="flex-grow" />
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </Link>
        <Link :href="route('badaso.commerce-theme.change-password')" class="h-10 px-4 flex items-center gap-2 text-sm border-b">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
          </svg>
          Change Password
          <div class="flex-grow" />
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </Link>
        <Link :href="route('badaso.commerce-theme.notification')" class="h-10 px-4 flex items-center gap-2 text-sm border-b">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          Notification
          <div class="flex-grow" />
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </Link>
      </div>

      <div class="px-2 mt-4">
        <div @click="() => logout()" class="h-8 rounded-md uppercase text-sm font-medium flex items-center justify-center text-center w-full bg-primary text-white">
          Logout
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import appLayout from '../../layouts/app.vue'
import profileLayout from '../../layouts/profile.vue'
import { mapState } from 'vuex'
import { Link, Head } from '@inertiajs/inertia-vue'

export default {
  layout: [appLayout, profileLayout],
  components: {
    Link,
    Head
  },
  data() {
    return {
      name: null,
      email: null,
      avatar: null,
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
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value;
      },
    }),
  },
  mounted() {
    if (!this.isAuthenticated) {
      this.$inertia.visit(this.route('badaso.commerce-theme.login'))
    }

    this.name = this.user.name
    this.email = this.user.email
  },
  methods: {
    filesChange(e) {
      const file = e.target.files[0]
      const fileSize = Math.round((file.size / 1024))
      if (fileSize > 2048) {
        this.$alert('Maksimal ukuran gambar adalah 2MB!')
        return
      }
      const fileReader = new FileReader()
      fileReader.readAsDataURL(file)
      fileReader.onload = () => {
        this.avatar = fileReader.result
      }
      fileReader.onerror = (error) => {
        this.$alert(error)
      };
    },
    save() {
      this.$api.badasoUser
        .edit({
          name: this.name,
          avatar: this.avatar
        })
        .then(res => {
          this.$store.dispatch('SET_USER', res.data.user)
        })
    },
    logout() {
      this.$api.badasoAuth
        .logout()
        .then(res => {
        })
        .catch(err => {
        })
        .finally(() => {
          this.$store.dispatch("SET_IS_AUTHENTICATED", false);
          this.$store.dispatch("SET_NOTIFICATIONS", {
            data: [],
            total: null,
            currentPage: 1,
            perPage: 10
          });
          this.$store.dispatch("SET_USER", {
            name: null,
            email: null,
            additionalInfo: null,
            avatar: null,
            emailVerifiedAt: null,
            password: null,
            rememberToken: null,
            createdAt: null,
            updatedAt: null,
          });
          this.$inertia.visit(this.route('badaso.commerce-theme.login'))
        })
    }
  }
}
</script>
