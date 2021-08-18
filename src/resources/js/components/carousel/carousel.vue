<template>
  <!-- Carousel Container -->
  <div class="relative">
    <div class="w-full overflow-hidden" v-bind="{...$attrs}">
      <!-- Carousel Track -->
      <div class="flex m-0 p-0 relative transition-all duration-500 ease-in-out" :style="{ transform: `translateX(-${currentPosition}px)`}">
        <slot />
      </div>
      <template v-if="!hideNavigationData">
        <button v-if="canPrev" @click="prev" class="-left-3 p-1 focus:outline-none hover:scale-150 transition-transform ease shadow-md rounded-full bg-white absolute transform -translate-y-1/2 top-1/2 z-10">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
        <button v-if="canNext" @click="next" class="-right-3 p-1 focus:outline-none hover:scale-150 transition-transform ease shadow-md rounded-full bg-white absolute transform -translate-y-1/2 top-1/2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </template>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentPosition: 0,
      start: 1,
      end: parseInt(this.show),
      canPrev: false,
      canNext: true,
      hideNavigationData: false,
    }
  },
  props: {
    scrollNumber: {
      default: 1,
      type: Number|String,
    },
    show: {
      type: Number|String,
      default: '3',
    },
    hideNavigation: {
      type: Boolean,
      default: false
    }
  },
  watch: {
    start: {
      handler(newVal, oldVal) {
        if (newVal <= 1) {
          this.canPrev = false
        } else {
          this.canPrev = true
        }
      }
    },
    end: {
      handler(newVal) {
        if (newVal >= this.$children.length) {
          this.canNext = false
        } else {
          this.canNext = true
        }
      }
    }
  },
  mounted() {
    this.hideNavigationData = this.hideNavigation
    if (this.show == this.$children.length) {
      this.hideNavigationData = true
    }
  },
  methods: {
    next() {
      if (this.canNext) {
        if (this.end + parseInt(this.show) > this.$children.length) {
          this.end = this.$children.length
          this.start += this.$children.length % parseInt(this.show);
        } else {
          this.start += parseInt(this.show);
          this.end += parseInt(this.show);
        }
        let childWidth = this.$slots.default[0].elm.clientWidth
        this.currentPosition = childWidth * (this.end - parseInt(this.show))
      }
    },
    prev() {
      if (this.canPrev) {
        if (this.start - parseInt(this.show) <= 1) { 
          this.start = 1
          this.end = parseInt(this.show)
          this.currentPosition = 0
        } else {
          this.start -= parseInt(this.show)
          this.end -= parseInt(this.show)
          let childWidth = this.$slots.default[0].elm.clientWidth
          this.currentPosition -= childWidth * (this.end - this.start + 1)
        }
      }
    },
  }
}
</script>
