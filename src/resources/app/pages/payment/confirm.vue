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
          <div class="w-full flex text-sm bg-white p-3 border-b border-gray-300 justify-between">
            <p>Total Pembayaran</p>
            <span class="text-primary font-medium">{{ $currency(total) }}</span>
          </div>
          <div 
            class="w-full flex text-sm bg-white p-3 border-b border-gray-300 justify-between cursor-pointer items-center" 
            @click="openAccordion = !openAccordion"
          >
            <p>Informasi Bank</p>
            <div class="w-6 h-6 transform transition-transform duration-300 ease-in-out" :class="openAccordion ? '-rotate-180' : ''">
              <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2} d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </div>
          <div 
            class="w-full gap-2 bg-white border-b p-4 border-gray-300 origin-top transform transition-transform duration-300 ease-in-out" 
            :class="[openAccordion ? 'flex' : 'hidden']"
          >
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
          <div class="w-full flex flex-nowrap gap-2 p-2">
            <div class="text-xs text-gray-500">Pastikan Anda telah melengkapi seluruh informasi sebelum upload bukti transfer. Shopee akan memeriksa bukti Anda dalam 24 jam.</div>
          </div>
          <div class="w-full flex text-sm flex-col bg-white p-3 border-t border-b border-gray-300 justify-between">
            <p>Info Rek Bank:</p>
            <label class="block text-center select-none max-w-full" for="receipt_file">
              <div class="inline-block mx-3 mt-3.5 w-24 h-24 border-2 border-gray-700 text-gray-700 border-dashed cursor-pointer">
                <template v-if="selected.proofOfTransaction === null">
                  <div class="flex justify-center flex-col items-center h-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <div class="text-center">Sentuh untuk Upload</div>
                  </div>
                </template>
                <template v-else>
                  <div class="flex justify-center items-center h-full w-full">
                    <img :src="selected.proofOfTransaction">
                  </div>
                </template>
              </div>
            </label>
            <input accept="image/*" type="file" class="w-full h-full absolute opacity-0 hidden" name="receipt_file" id="receipt_file" ref="image" @change="onFilePicked">
          </div>
          <div class="w-full flex text-sm bg-white p-2 border-b border-gray-300 items-center gap-2">
            <img :src="sampleProofOfTransaction" @click="openDialog = true" alt="Sample proof of transaction" class="w-8 h-8 rounded cursor-pointer border border-gray-300">
            <span class="text-xs text-gray-500">Contoh Foto untuk Transfer ATM</span>
          </div>

          <!-- Modal Dialog -->
          <transition
            enter-active-class="transition-all duration-300 ease-in-out"
            leave-active-class="transition-all duration-300 ease-in-out"
            enter-class="opacity-0"
            leave-to-class="opacity-0"
          >
            <div class="fixed z-10 inset-0 w-full h-full overflow-x-hidden overflow-y-hidden flex justify-center items-center" v-if="openDialog">
              <div class="absolute z-10 bg-black bg-opacity-30 w-full h-full cursor-pointer" @click="openDialog = false"></div>
              <div class="absolute z-20 bg-white max-w-xl w-full p-4 rounded flex justify-center flex-wrap gap-2">
                <img :src="sampleProofOfTransaction" alt="Sample proof of transaction" class="h-40 mb-2">
                <a 
                  :href="sampleProofOfTransaction"
                  download="transaction.png"
                  target="_blank"
                  class="py-2 bg-primary text-white w-full rounded text-sm text-center"
                >
                  Download
                </a>
                <button 
                  @click="openDialog = false"
                  class="py-2 bg-white border border-primary hover:bg-primary hover:bg-opacity-10 text-primary w-full rounded text-sm"
                >
                  OK
                </button>
              </div>
            </div>
          </transition>

          <div class="w-full flex flex-wrap text-sm bg-white border-b border-gray-300 items-center divide-y mt-2 mb-15">
            <div class="flex justify-between items-center w-full h-12 px-3">
              <div class="text-sm">Nama pengirim di Rekening Bank</div>
              <input type="text" v-model="selected.name" placeholder="Nama Lengkap" class="max-h-20 outline-none p-1 border border-gray-300 text-right">
            </div>
            <div class="flex justify-between items-center w-full h-12 px-3">
              <div class="text-sm">Transfer dari Bank</div>
              <bottom-sheet v-model="bankSourceSheet" full-screen>
                <template v-slot:activator="{ on, attrs }">
                  <div 
                    class="flex gap-2 text-sm items-center cursor-pointer text-gray-400"
                    v-bind="attrs"
                    v-on="on"
                    v-if="!selected.sourceBank.key"
                  >
                    Pilih Bank
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </div>
                  <div 
                    class="flex gap-2 text-sm items-center cursor-pointer text-gray-700"
                    v-bind="attrs"
                    v-on="on" 
                    v-else
                  >
                    {{ selected.sourceBank.item }}
                  </div>
                </template>
                <list :items="availableBanks">
                  <template v-slot:item="{ data }">
                    <div 
                      class="h-16 flex w-full items-center px-4 cursor-pointer"
                      :class="selected.sourceBank.key == data.key ? 'gap-2' : ''"
                      @click="selected.sourceBank = data; bankSourceSheet = false"
                    >
                      <span v-if="selected.sourceBank.key == data.key">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </span> {{ data.item }}
                    </div>
                  </template>
                </list>
              </bottom-sheet>
            </div>
            <div class="flex justify-between items-center w-full h-14 px-3">
              <div class="text-sm flex flex-col">
                Masukknan No. Rekening Anda
                <small>Pembayaran melalui teller, isi dengan 9999.</small>
              </div>
              <input type="text" v-model="selected.accountNumber" placeholder="1234567890" class="max-h-20 outline-none p-1 border border-gray-300 text-right">
            </div>
            <div class="flex justify-between items-center w-full h-12 px-3">
              <div class="text-sm">Transfer ke Bank</div>
              <bottom-sheet v-model="bankDestinationSheet" full-screen>
                <template v-slot:activator="{ on, attrs }">
                  <div 
                    class="flex gap-2 text-sm items-center cursor-pointer text-gray-400"
                    v-bind="attrs"
                    v-on="on"
                    v-if="!selected.destinationBank.name"
                  >
                    Pilih Bank
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                  </div>
                  <div 
                    class="flex gap-2 text-sm items-center cursor-pointer text-gray-700"
                    v-bind="attrs"
                    v-on="on" 
                    v-else
                  >
                    {{ selected.destinationBank.displayName }}
                  </div>
                </template>
                <list :items="[bank]">
                  <template v-slot:item="{ data }">
                    <div 
                      class="h-16 flex w-full items-center px-4 cursor-pointer"
                      :class="selected.destinationBank.name == data.item.name ? 'gap-2' : ''"
                      @click="selected.destinationBank = {name: data.item.name, displayName: data.item.displayName}; bankDestinationSheet = false"
                    >
                      <span v-if="selected.destinationBank.name == data.item.name">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </span> {{ data.item.displayName }}
                    </div>
                  </template>
                </list>
              </bottom-sheet>
            </div>
            <div class="flex justify-between items-center w-full h-12 px-3">
              <div class="text-sm">Jumlah Ditransfer ({{ currencySymbol }})</div>
              <div class="flex gap-2 text-sm items-center cursor-pointer">
                <label class="text-gray-400">{{ currencySymbol }}</label>
                <input type="text" v-model="selected.totalTransfered" placeholder="Jumlah Ditransfer" class="max-h-20 outline-none p-1 border border-gray-300 text-right">
              </div>
            </div>
          </div>

          <div class="w-full flex flex-wrap gap-2 p-2 border-t border-gray-300 fixed bottom-0 max-w-xl bg-white">
            <button @click="send" class="w-full p-2 bg-primary text-white rounded text-center text-sm" :to="{ name: 'PaymentConfirm' }">
              Kirimkan
            </button>
          </div>
        </div>
      </div>
  </div>
</template>

<script>
import BottomSheet from './../../components/bottom-sheet/bottom-sheet.vue'
import List from './../../components/list/list.vue'
import { mapState } from 'vuex'
import {
  required,
  alphaNum,
  integer
} from "vuelidate/lib/validators";
export default {
  components: {
    BottomSheet,
    List
  },
  data() {
    return {
      total: 0,
      openAccordion: false,
      openDialog: false,
      bankDestinationSheet: false,
      bankSourceSheet: false,
      selected: {
        proofOfTransaction: null,
        destinationBank: {
          name: null,
          displayName: null
        },
        sourceBank: {
          key: null,
          name: null
        },
        accountNumber: null,
        name: null,
        totalTransfered: 0
      },
      order: {}
    }
  },
  validations: {
    selected: {
      proofOfTransaction: {
        required,
      },
      destinationBank: {
        required,
      },
      sourceBank: {
        required,
      },
      accountNumber: {
        required,
        alphaNum,
      },
      totalTransfered: {
        required,
        integer
      }
    },
  },
  computed: {
    ...mapState({
      transactionUniqueCode(state) {
        return this.$_.find(state.themeConfigurations, { key: "transactionUniqueCode" }).value
      },
      separator(state) {
        if (this.total > 1000) {
          return this.$_.find(state.moduleConfigurations, { key: "currencySeparator" }).value
        }
      },
      bank(state) {
        return JSON.parse(this.$_.find(state.moduleConfigurations, { key: "paymentBank" }).value)
      },
      title(state) {
        return this.$_.find(state.themeConfigurations, { key: "themeTitle" }).value;
      },
      sampleProofOfTransaction(state) {
        return this.$_.find(state.themeConfigurations, { key: "sampleProofOfTransaction" }).value;
      },
      currencySymbol(state) {
        return this.$_.find(state.moduleConfigurations, { key: "currencySymbol" }).value;
      },
      availableBanks(state) {
        return JSON.parse(this.$_.find(state.moduleConfigurations, { key: "availableBanks" }).value)
      },
    })
  },
  mounted() {
    this.fetchOrder()
  },
  methods: {
    onFilePicked(e) {
      const files = e.target.files;
      if (files[0] !== undefined) {
        if (files[0].size > 512000) {
          this.$helper.alert("Out of limit size")
          return;
        }

        let fr = new FileReader()
        fr.readAsDataURL(files[0])
        fr.addEventListener("load", () => {
          this.selected.proofOfTransaction = fr.result
        })
      }
      return
    },
    send() {
      if (!this.$v.selected.$invalid) {
        this.$openLoading()
        this.$api.badasoOrder
          .pay({
            id: this.$route.params.id,
            ...this.selected,
            destinationBank: this.selected.destinationBank.name,
            sourceBank: this.selected.sourceBank.key,
          })
          .then(res => {
            this.$helper.alert(res.message)
            this.$router.push({
              name: "Order"
            })
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
      } else {
        console.log(this.$v);
        this.$helper.displayErrors("Please check the input that you provide again.")
      }
    },
    fetchOrder() {
      this.$openLoading()
      this.$api.badasoOrder
        .read({
          id: this.$route.params.id
        })
        .then(res => {
          this.order = res.data.order
          this.total = parseInt(res.data.order.payed)
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