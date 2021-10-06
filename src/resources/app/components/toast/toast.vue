<template>
  <transition 
    enter-active-class="transition-all ease-out duration-500"
    leave-active-class="transition-all ease-in duration-300"
    enter-class="opacity-0"
    enter-to-class="opacity-100"
    leave-class="opacity-100"
    leave-to-class="opacity-0"
  >
    <div :class="containerClasses">
      <span class="text-base">{{ message }}</span>
      <div class="cursor-pointer" @click="close">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-5 w-5"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M6 18L18 6M6 6l12 12"
          />
        </svg>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  props: {
    message: [String],
    timeout: [Number],
    bgColor: [String],
    textColor: [String],
  },
  data() {
    return {
      timeoutInstance: null,
    }
  },
  computed: {
    containerClasses() {
      return [
        "flex flex-nowrap transform transform transition-all",
        "rounded-md shadow-md p-3 items-center justify-between",
        "duration-300 ease-in-out w-full",
        `bg-${this.bgColor} text-${this.textColor}`,
      ];
    },
  },
  created() {
    this.timeoutInstance = setTimeout(() => {
      this.close()
    }, this.timeout);
  },
  beforeDestroy() {
    clearTimeout(this.timeoutInstance)
  },
  methods: {
    close() {
      this.$store.dispatch("CLOSE_TOAST", this.$vnode.key);
    },
  },
};
</script>