<template>
  <!-- Carousel Container -->
  <div class="w-full overflow-hidden relative group">
    <!-- Carousel Track -->
    <div class="h-full flex m-0 p-0 relative transition-all duration-500 ease-in-out" :style="{ transform: `translateX(-${currentPosition}%)`}" ref="carouselSingle">
      <slot />
    </div>

    <!-- Carousel Navigation Button -->
    <template>
      <div class="absolute top-1/2 transform -translate-y-1/2 left-0 z-10 invisible group-hover:visible">
        <button @click="prev" class="py-2 bg-primary bg-opacity-40 hover:bg-opacity-75 rounded-r-xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
      <div class="absolute top-1/2 transform -translate-y-1/2 right-0 z-10 invisible group-hover:visible">
        <button @click="next" class="py-2 bg-primary bg-opacity-40 hover:bg-opacity-75 rounded-l-xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </button>
      </div>
    </template>

    <!-- Carousel Pagination -->
    <template>
      <div class="w-full justify-center absolute bottom-2 flex gap-2">
        <div :class="['w-3 h-3 rounded-full border border-gray-400 bg-primary', currentActiveIndex === index ? 'bg-opacity-100' : 'bg-opacity-30']" v-for="index in getTotalPage" :key="index" />
      </div>
    </template>
  </div>
</template>

<script>
export default {
  props: {
    autoplay: {
      type: Boolean,
      default: false
    },
    autoplayDuration: {
      type: Number,
      default: 5000
    },
  },
  data() {
    return {
      totalPage: 0,
      currentActiveIndex: 1,
      currentPosition: 0,
      interval: undefined,
      observer: undefined
    }
  },
  computed: {
    getTotalPage() {
      return this.totalPage
    }
  },
  watch: {
    '$slots.default': {
      handler(val) {
        this.totalPage = val.length
      }
    }
  },
  mounted() {
    const observer = new MutationObserver(this.setTotalPage);
    observer.observe(this.$el, {
      childList: true,
      subtree: true 
    });
    this.observer = observer;

    this.interval = setInterval(() => {
      this.next()
    }, this.autoplayDuration);
  },
  beforeDestroy() {
    clearInterval(this.interval)
    this.observer.disconnect()
  },
  methods: {
    setTotalPage() {
      this.totalPage = this.$slots.default.length
    },
    next() {
      if (this.currentActiveIndex + 1 === this.totalPage) {
        this.currentActiveIndex = this.totalPage
        this.currentPosition = (this.totalPage - 1) * 100
        return
      }

      if (this.currentActiveIndex + 1 < this.totalPage) {
        this.currentActiveIndex += 1
        this.currentPosition += 100
        return
      }

      if (this.autoplay) {
        if (this.currentActiveIndex === this.totalPage) {
          this.currentActiveIndex = 1
          this.currentPosition = 0
          return
        }
      }
    },
    prev() {
      if (this.currentActiveIndex - 1 === 1) {
        this.currentActiveIndex = 1
        this.currentPosition = 0
        return
      }

      if (this.currentActiveIndex - 1 > 1) {
        this.currentActiveIndex -= 1
        this.currentPosition -= 100
        return
      }

      if (this.autoplay) {
        if (this.currentActiveIndex === 1) {
          this.currentActiveIndex = this.totalPage
          this.currentPosition = (this.totalPage - 1) * 100
          return
        }
      }
    }
  }
}
</script>