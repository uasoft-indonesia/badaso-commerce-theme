<template>
  <div>
    <div class="w-full relative">
      <transition
        key="container"
        enter-active-class="transition-all duration-150 ease-in-out"
        leave-active-class="transition-all duration-150 ease-in-out"
        enter-class="opacity-0"
        leave-to-class="opacity-0"
      >
        <div v-if="value" class="fixed inset-0 z-10 bg-black bg-opacity-30 w-full h-full cursor-pointer" @click="$emit('input', false)" />
      </transition>
      <transition
        key="content"
        enter-active-class="transition-all duration-300 ease-in-out"
        leave-active-class="transition-all duration-300 ease-in-out"
        enter-class="translate-y-full"
        enter-to-class="translate-y-0"
        leave-class="translate-y-0"
        leave-to-class="translate-y-full"
      >
        <div v-if="value" class="fixed z-20 left-0 right-0 bg-white bottom-0 transform"
          :class="fullScreen ? 'w-full h-full rounded-none' : 'w-full h-52 rounded-tl rounded-tr'"
        >
          <div class="fixed z-30 right-6 top-6 text-primary h-6 w-6 cursor-pointer" @click="$emit('input', false)">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </div>
          <slot />
        </div>
      </transition>
    </div>
    <slot name="activator" :on="listeners" :attr="$attrs"> </slot>
  </div>
</template>

<script>
export default {
  props: {
    fullScreen: [Boolean],
    value: [PointerEvent, Boolean],
  },
  data() {
    return {
      show: false
    }
  },
  computed: {
    listeners(){
      return {
        ...this.$listeners,
        click: (event) => {
          this.show = true
          this.$emit('input', event)
        },
      }
    },
  },
}
</script>