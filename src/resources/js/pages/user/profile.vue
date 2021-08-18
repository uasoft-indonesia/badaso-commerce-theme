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
          <div class="col-start-2 col-end-3 text-primary cursor-pointer text-sm">Profil</div>
        </router-link>
        <router-link :to="{ name: 'Address' }" class="w-full inline-flex items-center ml-10 group">
          <div class="col-start-2 col-end-3 text-gray-500 cursor-pointer text-sm group-hover:text-primary">Alamat</div>
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
      <div class="h-22 flex flex-col py-4 justify-center border-b">
        <span class="text-lg font-medium text-gray-700">Profil Saya</span>
        <span class="text-sm text-gray-500">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</span>
      </div>
      <div class="grid grid-cols-3 p-6 mb-4">
        <div class="col-span-2 grid items-center grid-cols-profile-content gap-x-6 pr-4">
          <div class="text-sm text-right text-gray-500 my-auto">Username</div>
          <div class="flex-1">
            <input type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
          </div>
          <div class="col-start-2 col-end-3 mb-4">
            <span class="text-xs text-gray-300">Username hanya dapat diubah satu (1) kali.</span>
          </div>
          <div class="text-sm text-right text-gray-500 mb-4">Nama</div>
          <div class="flex-1 mb-4">
            <input type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
          </div>
          <div class="text-sm text-right text-gray-500 mb-4">Email</div>
          <div class="flex-1 mb-4">
            <input type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
          </div>
          <div class="text-sm text-right text-gray-500 mb-4">Nomor Telepon</div>
          <div class="flex-1 mb-4">
            <input type="text" class="w-full border p-2 text-sm focus:outline-none hover:shadow-inner transition-shadow form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary">
          </div>
          <div class="text-sm text-right text-gray-500 mb-4">Jenis Kelamin</div>
          <div class="flex-1 mb-4 gap-3 flex flex-nowrap">
            <radio name="gender" v-model="gender" label="Laki-laki" :data="'men'" />
            <radio name="gender" v-model="gender" label="Perempuan" :data="'women'" />
            <radio name="gender" v-model="gender" label="Lainnya" :data="'other'" />
          </div>
          <div class="text-sm text-right text-gray-500 mb-4">Tanggal Lahir</div>
          <div class="flex-1 mb-4 flex justify-evenly gap-2">
            <select v-model="date" class="flex-1 border p-2 text-sm focus:outline-none hover:border-primary transition-shadow rounded-md form-select border-gray-200">
              <option :value="index" v-for="index in 31" :key="index">{{ index }}</option>
            </select>
            <select v-model="month" class="flex-1 border p-2 text-sm focus:outline-none hover:border-primary transition-shadow rounded-md form-select border-gray-200">
              <option :value="index + 1" v-for="(value, index) in monthOption" :key="index">{{ value }}</option>
            </select>
            <select v-model="year" class="flex-1 border p-2 text-sm focus:outline-none hover:border-primary transition-shadow rounded-md form-select border-gray-200">
              <option :value="index + 1900" v-for="index in 121" :key="index">{{ index + 1900 }}</option>
            </select>
          </div>
          <div class="col-start-2 col-end-3 mt-2">
            <button class="bg-primary font-medium px-6 py-2 rounded-md text-white text-sm filter hover:brightness-110">Simpan</button>
          </div>
        </div>
        <div class="flex flex-col justify-start col-span-1 p-8 items-center border-l ml-4">
          <div class="h-24 w-24 bg-gray-300 flex rounded-full p-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-auto w-full text-white" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
            </svg>
          </div>
          <button class="px-6 py-2 text-sm bg-white border mt-4 mb-2 rounded-md hover:bg-gray-50">
            Pilih Gambar
          </button>
          <span class="text-sm text-gray-400">Ukuran gambar: maks. 1 MB</span>
          <span class="text-sm text-gray-400">Format gambar: .JPEG, .PNG</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Radio from './../../components/form/radio.vue'
export default {
  components: {
    Radio
  },
  data() {
    return {
      gender: '',
      date: 1,
      month: 1,
      year: 1990
    }
  },
  computed: {
    monthOption() {
      return [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
      ]
    }
  }
}
</script>
