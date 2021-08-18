import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./routes.js";
import store from "../store/index"

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes: routes.map(route => ({
    path: route.path,
    name: route.name,
    component: route.component,
    meta: route.meta,
    beforeEnter(to, from, next) {
      store.dispatch("UPDATE_LAYOUT", route.layout);
      next();
    },
  })),
  scrollBehavior(to, from, savedPosition) {
    if (to.hash) {
      return {
        selector: to.hash
        // , offset: { x: 0, y: 10 }
      }
    }

    if (savedPosition) {
      return savedPosition
    } else {
      return { x: 0, y: 0 }
    }  
  }
});

router.beforeEach((to, from, next) => {
  to.meta.title
    ? document.title = to.meta.title || 'Badaso Commerce Theme'
    : ''
  next()
})

export default router