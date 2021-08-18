<template>
  <div class="relative select-none bg-primary flex items-stretch w-full h-8">
    <div class="container flex">
      <div class="flex flex-shrink-0 items-center divide-x">
        <a href="#" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm">
          Badaso
        </a>
        <a href="#" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm">
          Commerce Module
        </a>
      </div>
      <div class="lg:flex lg:items-stretch lg:flex-shrink-0 lg:flex-grow">
        <div class="lg:flex lg:justify-end ml-auto items-center">
          <div class="flex-grow-0 flex-shrink-0 relative px-4">
            <div class="block w-full h-full pointer-events-auto relative z-20" @mouseover="dropdownOpen = true">
              <router-link :to="{ name: 'Notification' }" class="flex leading-normal text-white no-underline items-center hover:text-gray-300 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifikasi
              </router-link>
            </div>

            <div v-if="dropdownOpen" @mouseover="dropdownOpen = false" class="inset-0 fixed h-full w-full z-10" />

            <transition name="fade">
              <div v-if="dropdownOpen" @mouseover="dropdownOpen = true" class="!absolute right-0 top-5 pt-2 z-20 w-96 overflow-hidden transition-all ease-in-out transform duration-300 origin-top-right">
                <div class="border shadow-xl border-gray-300 bg-white rounded-sm navigation-arrow-top">
                  <div class="p-2">
                    <div class="text-gray-300 text-sm mb-2">Notifikasi Baru Diterima</div>
                    <a href="#" class="flex items-start px-2 py-2 hover:bg-gray-100 -mx-2" v-for="index in 5" :key="index">
                      <img class="h-10 w-10 object-cover" src="https://picsum.photos/400/320">
                      <div>
                        <p class="text-gray-700 text-sm mx-2 line-clamp-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga, accusamus!</p>
                        <div class="line-clamp-4 text-xs mx-2 text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Corporis vero magnam, reprehenderit temporibus nostrum itaque, esse dignissimos aliquid quasi soluta fuga odio? Id eaque reprehenderit natus, tempora, harum porro facere expedita ullam at fuga unde error perferendis dolore possimus consequuntur non sapiente nulla minima praesentium quos. Voluptatum est voluptatem quaerat.</div>
                      </div>
                    </a>
                  </div>
                  <router-link :to="{ name: 'Notification' }" class="block bg-white text-gray-700 text-center text-sm py-2 -mt-2 hover:bg-gray-100">Tampilkan Semua</router-link>
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
            <router-link :to="{ name: 'Daftar'}" class="flex-grow-0 flex-shrink-0 relative px-3 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium">
              Daftar
            </router-link>
            <router-link :to="{ name: 'Log In'}" class="flex-grow-0 flex-shrink-0 relative px-3 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium">
              Login
            </router-link>
            <router-link :to="{ name: 'Profile'}" class="flex-grow-0 flex-shrink-0 relative px-4 leading-normal text-white no-underline flex items-center hover:text-gray-300 text-sm font-medium cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Admin
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
  }
}
</script>

<style lang="scss">
.fade-enter-active, .fade-leave-active {
  @apply transition-all transform duration-300;
}
.fade-enter, .fade-leave-to {
  @apply opacity-0 scale-50;
}
</style>