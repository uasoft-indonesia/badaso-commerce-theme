import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex)

export default new Vuex.Store({
  namespaced: true,
  state: {
    layout: 'default',
    user: {},
    meta: {
      mediaBaseUrl: ''
    }
  },
  mutations: {
    UPDATE_LAYOUT(state, layout) {
      state.layout = layout;
    }
  },
  actions: {
    UPDATE_LAYOUT({ commit }, layout) {
      commit('UPDATE_LAYOUT', layout)
    }
  },
  getters: {},
  plugins: [createPersistedState()],
});