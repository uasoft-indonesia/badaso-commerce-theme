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
          <div class="col-start-2 col-end-3 text-primary cursor-pointer text-sm">Alamat</div>
        </router-link>
        <router-link :to="{ name: 'ChangePassword' }" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Ubah Password</div>
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
      <div class="h-22 flex py-4 justify-between items-center border-b">
        <span class="text-lg font-medium text-gray-700">Alamat Saya</span>
        <button class="flex px-4 py-2 bg-primary rounded-md text-white items-center gap-2 text-sm">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
          </svg>
          Tambah Alamat Baru
        </button>
      </div>
      <div class="flex py-6 mb-4 flex-wrap divide-y">
        <div v-for="index in 3" :key="index" class="grid grid-cols-my-address w-full gap-2 first:pb-6 first:pt-0 last:pb-0 last:pt-6 pb-6 pt-6">
          <div class="grid grid-cols-profile-content gap-x-4 gap-y-1 items-center">
            <div class="text-right text-sm text-gray-500">Nama Lengkap</div>
            <div class="font-medium">John Doe <span class="hidden first:inline ml-4 text-xs font-medium py-0.5 px-1 bg-gray-500 text-white rounded-md">Utama</span></div>
            <div class="text-right text-sm text-gray-500">Telepon</div>
            <div>(+62) 81385363xxx</div>
            <div class="text-right text-sm text-gray-500 self-start">Alamat</div>
            <div class="leading-tight">	2332 Whispering Pines Circle <br /> Rockford <br/> Illinois <br/> 61110</div>
          </div>
          <div class="flex items-end flex-col gap-4">
            <div class="flex gap-4">
              <span class="text-sm underline cursor-pointer text-gray-500">Ubah</span>
              <span class="text-sm underline cursor-pointer text-gray-500">Hapus</span>
            </div>
            <button class="py-2 px-3 border rounded-md text-sm text-gray-500">
              Atur Sebagai Utama
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {
  },
  data() {
    return {
    }
  },
}
</script>
