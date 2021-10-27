import Vue from 'vue';
import Vuex from 'vuex';
import createPersistedState from "vuex-persistedstate";
import api from '../api/index'
import helper from '../utils/helper'
import * as _ from 'lodash'

Vue.use(Vuex)

export default new Vuex.Store({
  namespaced: true,
  state: {
    layout: 'defaultLayout',
    user: {},
    moduleConfigurations: [
      {
        key: "allowedCountries",
        value: "[]"
      },
      {
        key: "currencyPrecision",
        value: 0
      },
      {
        key: "currencyDecimal",
        value: "."
      },
      {
        key: "currencySeparator",
        value: ","
      },
      {
        key: "currencySymbol",
        value: "Rp"
      },
      {
        key: "homeProductLimit",
        value: 0
      },
      {
        key: "availableBanks",
        value: 0
      },
      {
        key: "paymentBank",
        value: null
      },
    ],
    themeConfigurations: [
      {
        key: "logoTextLightTheme",
        value: null
      },
      {
        key: "logoTextDarkTheme",
        value: null
      },
      {
        key: "themeTitle",
        value: null
      },
      {
        key: "themeSubtitle",
        value: null
      },
      {
        key: "logoTheme",
        value: null
      },
      {
        key: "transactionUniqueCode",
        value: 0
      },
      {
        key: "sampleProofOfTransaction",
        value: null
      },
      {
        key: "appName",
        value: null
      },
      {
        key: "tos",
        value: null
      },
      {
        key: "privacy",
        value: null
      },
      {
        key: "facebookUrl",
        value: null
      },
      {
        key: "instagramUrl",
        value: null
      },
      {
        key: "twitterUrl",
        value: null
      },
    ],
    isAuthenticated: false,
    user: {
      name: null,
      email: null,
      additionalInfo: null,
      avatar: null,
      emailVerifiedAt: null,
      password: null,
      rememberToken: null,
      createdAt: null,
      updatedAt: null
    },
    toast: [],
    carts: [],
    checkout: [],
    loading: false,
    notifications: {
      data: [],
      total: null,
      currentPage: 1,
      perPage: 10
    }
  },
  mutations: {
    UPDATE_LAYOUT(state, layout) {
      state.layout = layout;
    },
    FETCH_THEME_CONFIGURATION(state) {
      api.badasoCommerceThemeConfiguration
        .browse()
        .then(res => {
          state.themeConfigurations = res.data.configurations
        })
        .catch(err => {
          console.error(err);
        })

      api.badasoCommerceConfiguration
        .browse()
        .then(res => {
          state.moduleConfigurations = res.data.configurations
        })
        .catch(err => {
          console.error(err);
        })
    },
    SET_IS_AUTHENTICATED(state, payload) {
      state.isAuthenticated = payload
    },
    SET_USER(state, user) {
      state.user = { ...user }
    },
    SET_NOTIFICATIONS(state, notifications) {
      state.notifications = notifications
    },
    PUSH_TOAST(state, toast) {
      state.toast.push({
        ...toast,
        id: (Math.random().toString(36) + Date.now().toString(36)).substr(2)
      })
    },
    SLICE_TOAST(state, id) {
      let index = _.findIndex(state.toast, { id })
      state.toast.splice(index, 1)
    },
    PUSH_CART(state, cart) {
      state.carts.push(cart)
    },
    FETCH_CARTS(state) {
      api.badasoCart
        .browse()
        .then(res => {
          state.carts = res.data.carts
        })
        .catch(err => {
          helper.displayErrors(err)
        })
    },
    SET_CHECKOUT(state, carts) {
      state.checkout = carts
    },
    FETCH_USER(state) {
      if (localStorage.getItem('token')) {
        api.badasoAuthUser
          .user()
          .then(res => {
            state.user = res.data.user
          })
          .catch(err => {
            if (err.status === 401) {
              localStorage.removeItem('token')
              state.isAuthenticated = false
              state.user = {
                name: null,
                email: null,
                additionalInfo: null,
                avatar: null,
                emailVerifiedAt: null,
                password: null,
                rememberToken: null,
                createdAt: null,
                updatedAt: null
              }
            }
          })
      }
    },
    SHOW_LOADING(state) {
      state.loading = true
    },
    HIDE_LOADING(state) {
      state.loading = false
    },
    FETCH_NOTIFICATIONS(state) {
      api.badasoNotification
        .browse()
        .then(res => {
          state.notifications = res.data.notifications
        })
        .catch(err => {
          if (err.status === 401) {
            localStorage.removeItem('token')
            state.isAuthenticated = false
            state.user = {
              name: null,
              email: null,
              additionalInfo: null,
              avatar: null,
              emailVerifiedAt: null,
              password: null,
              rememberToken: null,
              createdAt: null,
              updatedAt: null
            }
          }
        })
    }
  },
  actions: {
    UPDATE_LAYOUT({ commit }, layout) {
      commit('UPDATE_LAYOUT', layout)
    },
    FETCH_THEME_CONFIGURATION({ commit }) {
      commit('FETCH_THEME_CONFIGURATION')
    },
    SET_IS_AUTHENTICATED({ commit }, payload) {
      commit('SET_IS_AUTHENTICATED', payload)
    },
    SET_NOTIFICATIONS({ commit }, payload) {
      commit('SET_NOTIFICATIONS', payload)
    },
    SET_USER({ commit }, user) {
      commit('SET_USER', user)
    },
    ADD_TOAST({ commit }, toast) {
      commit('PUSH_TOAST', toast)
    },
    CLOSE_TOAST({ commit }, id) {
      commit('SLICE_TOAST', id)
    },
    ADD_CART({ commit }, cart) {
      commit('PUSH_CART', cart)
    },
    FETCH_CARTS({ commit }) {
      commit('FETCH_CARTS')
    },
    SET_CHECKOUT({ commit }, carts) {
      commit('SET_CHECKOUT', carts)
    },
    FETCH_USER({ commit }) {
      commit('FETCH_USER')
    },
    HIDE_LOADING({ commit }) {
      commit('HIDE_LOADING')
    },
    SHOW_LOADING({ commit }) {
      commit('SHOW_LOADING')
    },
    FETCH_NOTIFICATIONS({ commit }) {
      commit('FETCH_NOTIFICATIONS')
    }
  },
  getters: {},
  plugins: [createPersistedState()],
});