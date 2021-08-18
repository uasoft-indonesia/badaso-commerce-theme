<template>
  <div class="pt-8 container grid grid-cols-profile">
    <div class="pr-8">
      <div class="h-22 flex items-center border-b">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="inline-block flex-wrap pl-2">
          <div class="text-sm font-medium w-full line-clamp-1 text-gray-700">Admin</div>
          <router-link :to="{ name: 'Profile' }" class="text-sm text-gray-500 w-full flex items-center gap-1 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
            </svg>
            Ubah Profil
          </router-link>
        </div>
      </div>
      <div class="mt-4 flex items-center gap-y-3 flex-wrap">
        <router-link :to="{ name: 'Profile' }" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
          <span class="text-gray-700 font-semibold group-hover:text-primary transition-colors text-sm pl-2">Akun Saya</span>
        </router-link>
        <router-link :to="{ name: 'Profile' }" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Profil</div>
        </router-link>
        <router-link :to="{ name: 'Address' }" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Alamat</div>
        </router-link>
        <router-link :to="{ name: 'ChangePassword' }" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 cursor-pointer text-sm text-primary">Ubah Password</div>
        </router-link>
        <router-link :to="{ name: 'Order' }" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Pesanan Saya</span>
        </router-link>
        <router-link :to="{ name: 'Notification' }" class="w-full inline-flex items-center group">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="text-gray-700 font-semibold cursor-pointer group-hover:text-primary transition-colors text-sm pl-2">Notifikasi</span>
        </router-link>
      </div>
    </div>
    <div class="bg-white shadow-sm px-6 rounded-xl">
      <div class="h-22 flex flex-col py-4 justify-center border-b">
        <span class="text-lg font-medium text-gray-700">Ubah Password</span>
        <span class="text-sm text-gray-500">Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</span>
      </div>
      <div class="grid grid-cols-change-password p-6 mb-4 gap-y-4 items-center gap-x-6 pr-4">
        <div class="text-sm text-right text-gray-500 my-auto">Password Saat Ini</div>
        <div class="flex-1">
          <password v-model="passwordNow" type="text" />
        </div>
        <div class="text-gray-500 text-sm cursor-pointer">Lupa Password?</div>
        <div class="text-sm text-right text-gray-500 my-auto">Password Yang Baru</div>
        <div class="flex-1">
          <password v-model="passwordNew" type="text" />
        </div>
        <div class="text-sm text-right text-gray-500 my-auto col-start-1">Konfirmasi Password</div>
        <div class="flex-1">
          <password v-model="passwordConfirmation" type="text" />
        </div>
        <div class="col-start-2 col-span-1">
          <button class="bg-primary font-medium px-6 py-2 rounded-md text-white text-sm filter hover:brightness-110">Konfirmasi</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Password from './../../components/form/password.vue'
export default {
  components: {
    Password
  },
  data() {
    return {
      passwordNow: '',
      passwordNew: '',
      passwordConfirmation: '',
    }
  },
}
</script>
