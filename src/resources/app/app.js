import Vue from 'vue';
import Vuelidate from 'vuelidate';
import currency from 'currency.js';
import * as _ from 'lodash'
import voca from 'voca'
import moment from 'moment';

import App from './apps/App.vue';
import VTooltip from './directives/v-tooltip'
import api from './api/index'
import store from './store/index.js';
import router from './router/router';
import helper from './utils/helper.js';

import CommerceLoading from './components/commerce-loading.vue'
import Alert from './components/alert/alert.vue'

Vue.config.productionTip = false;
Vue.config.devtools = true;

Vue.use(Vuelidate)
Vue.directive('tooltip', VTooltip)
Vue.component('commerce-loading', CommerceLoading)
Vue.component('alert', Alert)

Vue.prototype.$voca = voca
Vue.prototype.$api = api
Vue.prototype.$_ = _
Vue.prototype.$helper = helper
Vue.prototype.$sleep = (time) => {
  return new Promise((resolve) => setTimeout(resolve, time));
}
Vue.prototype.$alert = (message, timeout = 3000, backgroundColor = "gray-800", textColor = "white") => {
  store.dispatch("ADD_TOAST", {
    message,
    backgroundColor,
    timeout,
    textColor,
  })
}
Vue.prototype.$currency = (value) => {
  return currency(value, {
    precision: _.find(store.state.moduleConfigurations, { key: "currencyPrecision" }).value,
    decimal: _.find(store.state.moduleConfigurations, { key: "currencyDecimal" }).value,
    separator: _.find(store.state.moduleConfigurations, { key: "currencySeparator" }).value,
    symbol: _.find(store.state.moduleConfigurations, { key: "currencySymbol" }).value,
  }).format()
}
Vue.prototype.$moment = moment
Vue.prototype.$openLoading = () => {
  store.dispatch("SHOW_LOADING")
}
Vue.prototype.$closeLoading = () => {
  store.dispatch("HIDE_LOADING")
}

const app = new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount('#commerce-theme');