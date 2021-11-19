<template>
  <div class="relative select-none bg-primary flex items-stretch w-full h-8">
    <div class="container flex">
      <div class="flex flex-shrink-0 items-center divide-x">
        <a href="https://github.com/uasoft-indonesia/badaso" target="_blank" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm">
          Badaso
        </a>
        <a href="https://github.com/uasoft-indonesia/badaso-commerce-module" target="_blank" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm">
          Commerce Module
        </a>
      </div>
      <div class="lg:flex lg:items-stretch lg:flex-shrink-0 lg:flex-grow">
        <div class="lg:flex lg:justify-end ml-auto items-center">
          <div class="flex-grow-0 flex-shrink-0 relative px-4">
            <div class="block w-full h-full pointer-events-auto relative z-20" @mouseover="dropdownOpen = true">
              <Link :href="route('badaso.commerce-theme.notification')" class="flex leading-normal text-white no-underline items-center hover:text-gray-300 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifikasi
              </Link>
            </div>

            <div v-if="dropdownOpen" @mouseover="dropdownOpen = false" class="inset-0 fixed h-full w-full z-10" />

            <transition
              enter-active-class="transition-all transform duration-300"
              leave-active-class="transition-all transform duration-300"
              enter-class="opacity-0 scale-50"
              leave-to-class="opacity-0 scale-50"
            >
              <div v-if="dropdownOpen" @mouseover="dropdownOpen = true" class="!absolute right-0 top-5 pt-2 z-20 w-96 overflow-hidden transition-all ease-in-out transform duration-300 origin-top-right">
                <div class="border shadow-xl border-gray-300 bg-white rounded-sm navigation-arrow-top">
                  <div class="p-2">
                    <template v-if="isAuthenticated">
                      <div class="text-gray-300 text-sm mb-2">Notifikasi Baru Diterima</div>
                      <Link :href="route('badaso.commerce-theme.notification')" class="flex items-start px-2 py-2 hover:bg-gray-100 -mx-2" v-for="notification, index in notifications" :key="index">
                        <img class="h-10 w-10 object-cover" :src="logoTheme">
                        <div>
                          <p class="text-gray-700 text-sm mx-2 line-clamp-2">{{ notification.title }}</p>
                          <div class="line-clamp-4 text-xs mx-2 text-gray-400">{{ notification.content }}</div>
                        </div>
                      </Link>
                    </template>
                    <template v-else>
                      <div class="h-16 flex justify-center items-center flex-col">
                        <div class="text-sm text-gray-400">Login terlebih dahulu.</div>
                        <Link :href="route('badaso.commerce-theme.login')" class="block text-primary rounded-md text-sm font-medium">Log In</Link>
                      </div>
                    </template>
                  </div>
                  <Link v-if="notifications.length > 5" :href="route('badaso.commerce-theme.notification')" class="block bg-white text-gray-700 text-center text-sm py-2 -mt-2 hover:bg-gray-100">Tampilkan Semua</Link>
                </div>
              </div>
            </transition>
          </div>
          <a href="#" class="flex-grow-0 flex-shrink-0 relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Bantuan
          </a>
          <div class="flex items-center divide-x">
            <template v-if="!isAuthenticated">
              <Link :href="route('badaso.commerce-theme.register')" class="flex-grow-0 flex-shrink-0 relative px-3 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium">
                Daftar
              </Link>
              <Link :href="route('badaso.commerce-theme.login')" class="flex-grow-0 flex-shrink-0 relative px-3 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium">
                Login
              </Link>
            </template>
            <template v-else>
              <Link :href="route('badaso.commerce-theme.profile')" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ userName }}
              </Link>
              <div class="flex-grow-0 flex-shrink-0 relative px-3 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium cursor-pointer" @click="() => logout()">
                Logout
              </div>
            </template>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'
import { Link } from '@inertiajs/inertia-vue'
export default {
  components: {
    Link
  },
  data() {
    return {
      dropdownOpen: false
    }
  },
  watch: {
    '$route': {
      handler() {
        this.dropdownOpen = false
      }
    },
  },
  computed: {
    ...mapState({
      isAuthenticated(state) {
        return state.isAuthenticated
      },
      userName(state) {
        return state.user.name
      },
      notifications(state) {
        return this.$_.take(state.notifications.data, 5)
      },
      logoTheme(state) {
        return this.$_.find(state.themeConfigurations, { key: "logoTheme" }).value
      },
    })
  },
  methods: {
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
