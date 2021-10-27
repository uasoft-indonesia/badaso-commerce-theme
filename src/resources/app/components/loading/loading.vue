<template>
  <transition 
    enter-active-class="transition-all duration-150 ease-in-out"
    leave-active-class="transition-all duration-150 ease-in-out"
    enter-class="opacity-0"
    leave-to-class="opacity-0"
  >
    <div class="fixed inset-0 w-full h-full z-40" v-if="loading">
      <div class="fixed inset-0 w-full h-full z-40 bg-black bg-opacity-40"></div>
      <div class="absolute w-32 h-32 z-50 rounded left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 flex justify-center items-center">
        <div class="sk-chase">
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
          <div class="sk-chase-dot"></div>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: {
    ...mapState(["loading"])
  }
}
</script>