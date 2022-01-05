import Vue from "vue";
import {
  createInertiaApp,
  plugin as InertiaPlugin,
} from "@inertiajs/inertia-vue";
import { Inertia } from "@inertiajs/inertia";
import Vuelidate from "vuelidate";
import currency from "currency.js";
import * as _ from "lodash";
import voca from "voca";
import moment from "moment";
import VueGtag from "vue-gtag";

import VTooltip from "./directives/v-tooltip";
import api from "./api/index";
import store from "./store/index.js";
import helper from "./utils/helper.js";

import CommerceLoading from "./components/commerce-loading.vue";
import Alert from "./components/alert/alert.vue";
import Radio from "./components/form/radio.vue";

Vue.config.productionTip = false;
Vue.config.devtools = true;

Vue.use(Vuelidate);
Vue.directive("tooltip", VTooltip);
Vue.component("commerce-loading", CommerceLoading);
Vue.component("alert", Alert);
Vue.component("radio", Radio);

const plugins = process.env.MIX_PAYMENT_MODULE.split(",");

try {
  plugins.forEach((plugin) => {
    const files =
      require(`@/${plugin}/src/resources/payment/components`).default;
    _.forEach(files, (file, index) => {
      Vue.component(index, file);
    });
  });
} catch (error) {}

Vue.prototype.$voca = voca;
Vue.prototype.$api = api;
Vue.prototype.$_ = _;
Vue.prototype.$helper = helper;
Vue.prototype.$sleep = (time) => {
  return new Promise((resolve) => setTimeout(resolve, time));
};
Vue.prototype.$alert = (
  message,
  timeout = 3000,
  backgroundColor = "gray-800",
  textColor = "white"
) => {
  store.dispatch("ADD_TOAST", {
    message,
    backgroundColor,
    timeout,
    textColor,
  });
};
Vue.prototype.$currency = (value) => {
  return currency(value, {
    precision: _.find(store.state.moduleConfigurations, {
      key: "currencyPrecision",
    }).value,
    decimal: _.find(store.state.moduleConfigurations, {
      key: "currencyDecimal",
    }).value,
    separator: _.find(store.state.moduleConfigurations, {
      key: "currencySeparator",
    }).value,
    symbol: _.find(store.state.moduleConfigurations, { key: "currencySymbol" })
      .value,
  }).format();
};
Vue.prototype.$moment = moment;
Vue.prototype.$openLoading = () => {
  store.dispatch("SHOW_LOADING");
};
Vue.prototype.$closeLoading = () => {
  store.dispatch("HIDE_LOADING");
};
Vue.use(InertiaPlugin);
Vue.mixin({ methods: { route } });

Inertia.on("navigate", (event) => {
  const page_title = document.title;
  const { href: page_location, pathname: page_path } = window.location;

  const configuration = {
    page_title,
    page_location,
    page_path,
  };

  gtag("js", new Date());
  gtag("config", window.measurement_id, configuration);
});

const appName =
  window.document.getElementsByTagName("title")[0]?.innerText ||
  "Badaso Commerce Theme";

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const isExists = require
      .context(
        "./../../../../../../resources/js/badaso/theme/commerce-theme/pages",
        false,
        /\.vue$/
      )
      .keys()
      .some((key) => key.includes(name));

    if (isExists) {
      return require(`./../../../../../../resources/js/badaso/theme/commerce-theme/pages/${name}.vue`);
    } else {
      return require(`./pages/${name}.vue`);
    }
  },
  setup({ el, App, props }) {
    new Vue({
      store,
      render: (h) => h(App, props),
    }).$mount(el);
  },
});
