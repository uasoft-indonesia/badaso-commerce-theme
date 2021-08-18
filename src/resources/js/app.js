import Vue from 'vue';
import store from './store/index.js';
import router from './router/router';
import VueTailwind from 'vue-tailwind'

import App from './apps/App.vue';
import VTooltip from './directives/v-tooltip'

import voca from 'voca'

Vue.config.productionTip = false;
Vue.config.devtools = true;

Vue.use(VueTailwind);
Vue.directive('tooltip', VTooltip)

Vue.prototype.$img = (url) => {
  return store.state.meta.mediaBaseUrl !== '' 
    ? store.state.meta.mediaBaseUrl + url
    : process.env.MIX_APP_URL + '/storage/' + url;
}

Vue.prototype.$voca = voca

const app = new Vue({
  router,
  store,
  render: (h) => h(App),
}).$mount('#commerce-theme');