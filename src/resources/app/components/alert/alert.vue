<template>
  <div :class="containerClasses">
    <div v-if="closeable" class="absolute top-2 right-2 cursor-pointer" @click="close">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </div>
    <div :class="['flex gap-2 flex-nowrap', `items-${align}`]">
      <template v-if="!noIcon">
        <div v-if="$slots.icon" class="h-6 w-6">
          <slot name="icon" />
        </div>
        <div class="w-6 h-6 flex-grow" v-else>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
      </template>
      <div :class="textClasses">
        <slot />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isClose: false
    }
  },
  props: {
    color: {
      type: String,
      default: 'primary'
    },
    textColor: {
      type: String,
      default: 'white'
    },
    closeable: [Boolean],
    align: {
      type: String,
      default: 'center'
    },
    noIcon: [Boolean]
  },
  computed: {
    containerClasses() {
      return [
        'rounded-md w-full px-2 py-3 relative transition-all duration-300 ease-in-out transform',
        `bg-${this.color} text-${this.textColor}`,
        this.isClose ? 'opacity-0' : ''
      ]
    },
    textClasses() {
      return [
        'text-sm pr-5',
        this.noIcon ? 'pl-2' : ''
      ]
    },
    getIcon() {
      return true
    }
  },
  methods: {
    close() {
      this.isClose = true
      setTimeout(() => {
        this.$destroy();
        this.$el.parentNode.removeChild(this.$el);
      }, 300);
    }
  }
}
</script>