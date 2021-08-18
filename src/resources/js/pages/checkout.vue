<template>
  <div class="mt-4 container">
    <div class="bg-white rounded-xl shadow-md">
      <div class="p-6">
        <div class="flex text-primary items-center gap-2 text-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
          </svg>
          Alamat Pengiriman
        </div>
        <div class="flex flex-nowrap gap-8 mt-2 items-center">
          <div class="break-words font-bold">Danny Atthaya (+62) 81385363697</div>
          <div>Jl. Aru Indah No.5, Lubuk Begalung Nan XX, KOTA PADANG - LUBUK BEGALUNG, SUMATERA BARAT, ID 25226</div>
          <div class="text-sm font-medium text-gray-400">Utama</div>
          <div class="text-sm font-medium text-primary cursor-pointer">UBAH</div>
        </div>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-md mt-4">
      <div class="p-6 grid">
        <div class="gap-2 grid grid-cols-6">
          <div class="col-span-3 text-lg font-medium">Produk Dipesan</div>
          <div class="text-gray-300 text-sm">Harga Satuan</div>
          <div class="text-gray-300 text-sm">Jumlah</div>
          <div class="text-gray-300 text-sm text-right">Subtotal Produk</div>
        </div>
        <div class="divide-y divide-dashed border-b border-dashed mt-4">
          <div class="gap-2 grid grid-cols-6 items-center py-4" v-for="index in 4" :key="index">
            <div class="col-span-3 flex gap-4 items-center">
              <img src="https://picsum.photos/400/320" class="w-12 h-12">
              <div class="line-clamp-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta, ad.</div>
            </div>
            <div class="text-sm">Rp103.000</div>
            <div class="text-sm">1</div>
            <div class="text-sm text-right">Rp103.000</div>
          </div>
        </div>
        <div class="grid grid-cols-6 items-center border-b border-dashed">
          <div class="col-span-4 flex items-center gap-4 border-r py-4 border-dashed pr-4 text-sm">
            Pesan: 
            <textarea class="text-sm resize w-full focus:outline-none focus:ring-0 focus:ring-offset-0 form-textarea focus:border-primary border-gray-300" rows="1" placeholder="(Optional) Tinggalkan pesan ke penjual"></textarea>
          </div>
          <div class="col-span-2 flex items-center justify-between gap-4 pl-4 py-4">
            <div class="text-sm text-gray-400">Ongkos Kirim (Fixed)</div>
            <div class="text-sm">Rp30.000</div>
          </div>
        </div>
        <div class="flex pt-6 justify-end gap-4 items-center">
          <div class="text-sm text-gray-400">Total Pesanan (4 Produk): </div>
          <div class="text-xl text-primary font-medium">Rp133.000</div>
        </div>
      </div>
    </div>
    <div class="bg-white rounded-xl shadow-md mt-4">
      <div class="grid grid-cols-8">
        <div class="pl-6 pt-6 text-lg leading-tight font-medium text-gray-700">Metode Pembayaran</div>
        <div class="ml-4 pt-6 col-span-7 flex gap-4 flex-wrap">
          <button tabindex="-1" class="border border-primary px-4 py-2 text-sm font-medium rounded-md text-primary relative">
            Transfer Bank
            <span class="absolute bottom-0 right-0 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 absolute bottom-0 right-0" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
              </svg>
              <svg class="h-5 w-5 rounded-br-3 text-primary" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path transform="rotate(-90 12 12)" d="m0,24.00582l0,-24.00582l24.00582,24.00582l-24.00582,0z" fill="currentColor"/>
              </svg>
            </span>
          </button>
        </div>
        <div class="col-span-full my-8 h-px w-full bg-gray-300" />
        <div class="pl-6 text-lg leading-tight font-medium text-gray-700">Pilih Bank</div>
        <div class="ml-4 col-span-7 flex gap-6 flex-wrap">
          <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'bca'">
            <radio v-model="radioData" name="bank" data="bca" />
            <img src="https://mall.shopee.co.id/static/images/img_bankid_bca.png" class="border p-2 ml-2">
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Bank BCA (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div>
          <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'bni'">
            <radio v-model="radioData" name="bank" data="bni" />
            <img src="https://mall.shopee.co.id/static/images/img_bankid_bni.png" class="border p-2 ml-2">
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Bank BNI (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div>
          <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'bri'">
            <radio v-model="radioData" name="bank" data="bri" />
            <img src="https://mall.shopee.co.id/static/images/img_bankid_bri.png" class="border p-2 ml-2">
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Bank BRI (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div>
          <div class="flex items-center gap-4 cursor-pointer w-full" @click="radioData = 'mandiri'">
            <radio v-model="radioData" name="bank" data="mandiri" />
            <img src="https://mall.shopee.co.id/static/images/img_bankid_mandiri.png" class="border p-2 ml-2">
            <div class="flex flex-wrap">
              <div class="w-full text-sm">Bank Mandiri (Dicek Manual)</div>
              <div class="w-full text-sm text-gray-400">Perlu upload bukti transfer</div>
            </div>
          </div>
        </div>
        <div class="col-span-full p-6 mt-8 flex flex-wrap flex-col items-end gap-4 bg-primary bg-opacity-5 border-t border-gray-300">
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left">Subtotal untuk Produk:</div>
            <div class="text-sm text-gray-500">Rp103.000</div>
          </div>
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left">Total Ongkos Kirim:</div>
            <div class="text-sm text-gray-500">Rp30.000</div>
          </div>
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left flex gap-2 items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Biaya Penanganan:
            </div>
            <div class="text-sm text-gray-500">Rp1.000</div>
          </div>
          <div class="w-1/3 flex justify-between items-center flex-1">
            <div class="text-sm text-gray-500 text-left">Total Pembayaran:</div>
            <div class="text-3xl text-primary">Rp139.000</div>
          </div>
        </div>
        <div class="col-span-full p-6 flex rounded-b-xl flex-wrap flex-col items-end gap-4 bg-primary border-dashed bg-opacity-5 border-t border-gray-300">
          <button class="bg-primary px-12 py-2 text-white rounded-lg font-medium">
            Buat Pesanan
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Radio from './../components/form/radio.vue'
export default {
  components: {
    Radio
  },
  data() {
    return {
      radioData: 'bni'
    }
  }
}
</script>

<style lang="scss" scoped>
.rounded-br-3 {
  border-bottom-right-radius: 0.3rem;
}
</style>