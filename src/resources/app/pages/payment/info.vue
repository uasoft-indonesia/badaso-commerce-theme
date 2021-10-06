<template>
  <div class="w-full flex justify-center flex-wrap">
    <div class="h-12 flex justify-center items-center w-full border-b border-gray-300">
      <div class="lg:max-w-xl w-full flex items-center justify-center relative">
        <span class="select-none">
          {{ $route.meta.title }}
        </span>
        <a @click="() => $route.push({ name: 'Order' })" class="absolute left-4 cursor-pointer">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
        </a>
      </div>
    </div>
    <div class="lg:max-w-xl w-full">
      <div class="flex w-full flex-wrap justify-center select-none">
        <div class="w-full bg-white p-4 border-b border-gray-300">
          <p>Total Pembayaran:</p>
          <p class="text-4xl text-primary">{{ first }}{{ separator }}<span class="border border-red-600 font-medium">{{ last }}</span></p>
          <div class="mt-4 text-sm text-white p-1 px-2 bg-primary bg-opacity-80 border-l border-r border-dotted">
            Bayar pesanan sesuai jumlah di atas.
          </div>
          <div class="text-sm mt-2 text-gray-500">Dicek dalam 24 jam setelah bukti transfer diupload. Khusus untuk Beli Barang, diwajibkan untuk membayar sesuai total pembayaran (termasuk kode unik) sebelum batas waktu berakhir.</div>
        </div>
        <div class="w-full flex flex-nowrap gap-2 p-2">
          <div class="w-6 h-6">
            <svg id="svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6 text-primary flex-grow" viewBox="0, 0, 400,400" version="1.1">
              <path d="M143.037 41.161 C 3.999 92.696,-5.971 287.174,127.083 352.339 C 186.443 381.411,271.324 366.663,318.993 318.993 C 443.452 194.535,307.671 -19.861,143.037 41.161 M220.833 191.941 C 220.833 258.944,217.966 275.000,206.000 275.000 C 195.621 275.000,191.667 255.910,191.667 205.798 L 191.667 157.973 176.189 159.195 C 164.626 160.108,160.360 158.711,159.322 153.672 C 158.134 147.901,202.341 126.367,217.708 125.231 C 219.427 125.104,220.833 155.123,220.833 191.941 " stroke="none" fill="currentColor" fill-rule="evenodd">
              </path>
            </svg>
          </div>
          <div class="text-sm text-gray-500">Gunakan ATM / iBanking / mBanking / setor tunai untuk transfer ke rekening berikut ini:</div>
        </div>
        <div class="w-full gap-2 flex bg-white border-t border-b p-4 border-gray-300">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
          <div class="flex-grow flex flex-col w-full">
            <div class="w-full">{{ bank.displayName }}</div>
            <div class="flex w-full mt-2 text-gray-500 text-sm">
              <div class="flex-grow">
                No. Rekening: {{ bank.accountNumber }} <br />
                Nama Rekening: {{ bank.accountName }}
              </div>
              <div class="cursor-pointer self-baseline text-gray-400">SALIN</div>
            </div>
          </div>
        </div>
        <div class="w-full flex flex-wrap gap-4 p-2">
          <!-- <div class="w-full text-sm text-gray-500">
            *Pembayaran didukung oleh {{ appName }}
          </div> -->
          <div class="flex gap-2">
            <div class="w-6 h-6">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6 text-primary flex-grow" viewBox="0, 0, 400,400" version="1.1">
                <path id="path0" d="M137.778 49.836 C 33.422 89.851,5.497 232.941,86.278 313.722 C 188.849 416.294,360.000 345.186,360.000 200.000 C 360.000 84.104,247.198 7.880,137.778 49.836 M222.311 140.046 C 253.193 156.015,250.268 177.904,212.073 216.667 L 184.701 244.444 214.573 244.444 C 243.473 244.444,244.444 244.806,244.444 255.556 L 244.444 266.667 200.000 266.667 C 144.280 266.667,143.777 264.427,188.889 217.209 C 207.222 198.020,222.222 178.441,222.222 173.700 C 222.222 151.410,192.006 143.275,179.591 162.222 C 172.004 173.801,155.556 177.520,155.556 167.656 C 155.556 141.869,194.605 125.718,222.311 140.046 " stroke="none" fill="currentColor" fill-rule="evenodd">
                </path>
              </svg>
            </div>
            <div class="text-sm text-gray-500">Silakan upload bukti transfer <span v-if="order.expiredAt">sebelum {{ $moment(order.expiredAt).format('DD-MM-YYYY H:mm:ss') }}</span></div>
          </div>
          <div class="flex flex-nowrap gap-2">
            <div class="w-6 h-6">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="w-6 h-6 text-primary" viewBox="0, 0, 400,400" version="1.1">
                <path id="path0" d="M137.778 49.836 C 33.422 89.851,5.497 232.941,86.278 313.722 C 188.849 416.294,360.000 345.186,360.000 200.000 C 360.000 84.104,247.198 7.880,137.778 49.836 M231.453 146.325 C 247.767 162.639,247.801 171.076,231.611 186.200 L 218.777 198.189 231.688 205.599 C 254.954 218.951,254.119 243.121,229.881 257.899 C 203.731 273.843,160.506 263.854,154.386 240.453 C 151.135 228.019,165.519 227.741,177.778 240.000 C 196.968 259.190,233.725 243.471,223.278 220.542 C 220.055 213.469,213.254 209.030,202.573 207.026 C 185.400 203.804,180.036 191.111,195.848 191.111 C 218.121 191.111,230.750 170.305,216.889 156.444 C 208.585 148.140,187.424 150.125,178.969 160.000 C 164.554 176.835,147.817 168.133,161.252 150.788 C 177.986 129.187,212.144 127.016,231.453 146.325 " stroke="none" fill="currentColor" fill-rule="evenodd"></path>
              </svg>
            </div>
            <div class="text-sm text-gray-500">Demi kenyamanan transaksi, mohon untuk tidak membagikan bukti atau konfirmasi pembayaran pesanan kepada siapapun, selain mengunggahnya via web {{ title }}.</div>
          </div>
        </div>
        <div class="w-full flex flex-wrap gap-2 my-2">
          <router-link class="w-full p-2 bg-primary text-white rounded text-center text-sm" :to="{ name: 'PaymentConfirm', params: { id: $route.params.id } }">
            Upload bukti transfer sekarang
          </router-link>
          <router-link 
            class="w-full p-2 bg-transparent  text-primary border border-primary rounded text-center text-sm" 
            :to="{ name: 'Order' }"
          >
            Upload bukti transfer nanti
          </router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex'
export default {
  data() {
    return {
      order: {
        payed: 0,
        expiredAt: this.$moment()
      }
    }
  },
  computed: {
    last() {
      let string = `${parseInt(this.order.payed)}`
      return string.substr(-3)
    },
    ...mapState({
      first(state) {
        if (parseInt(this.order.payed) > 1000) {
          let string = `${parseInt(this.order.payed)}`
          return this.$currency(this.$voca.slice(string, 0, string.length - this.transactionUniqueCode))
        }
        return this.$_.find(state.moduleConfigurations, { key: "currencySymbol" }).value
      },
      transactionUniqueCode(state) {
        return this.$_.find(state.themeConfigurations, { key: "transactionUniqueCode" }).value
      },
      separator(state) {
        if (parseInt(this.order.payed) > 1000) {
          return this.$_.find(state.moduleConfigurations, { key: "currencySeparator" }).value
        }
      },
      bank(state) {
        return JSON.parse(this.$_.find(state.moduleConfigurations, { key: "paymentBank" }).value)
      },
      appName(state) {
        return this.$_.find(state.themeConfigurations, { key: "appName" }).value
      },
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
    })
  },
  mounted() {
    this.fetchOrder()
  },
  methods: {
    fetchOrder() {
      this.$openLoading()
      this.$api.badasoOrder
        .read({
          id: this.$route.params.id
        })
        .then(res => {
          this.order = res.data.order
          if (res.data.order.status != 'waitingBuyerPayment') {
            this.$router.push({
              name: "Order"
            })
          }
        })
        .catch(err => {
          this.$helper.displayErrors(err)
          this.$router.push({
            name: 'Order'
          })
        })
        .finally(() => {
          this.$closeLoading()
        })
    }
  }
}
</script>