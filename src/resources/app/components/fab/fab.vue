<template>
  <transition
    enter-active-class="transition-all duration-75 ease transform"
    leave-active-class="transition-all duration-75 ease transform"
    enter-class="opacity-50 translate-y-4"
    leave-to-class="opacity-50 translate-y-4"
    leave-class="opacity-100 translate-y-0"
    enter-to-class="opacity-100 translate-y-0"
  >
    <button :class="classes" v-on="$listeners" v-bind="$attrs" v-if="!isHide">
      <slot />
    </button>
  </transition>
</template>

<script>
export default {
  props: {
    color: {
      type: String,
      default: "primary",
    },
    height: {
      type: String | Number,
      default: 10,
    },
    width: {
      type: String | Number,
      default: 10,
    },
    offset: {
      type: String | Number,
      default: 200,
    }
  },
  data() {
    return {
      isHide: false
    }
  },
  computed: {
    classes() {
      return [
        "p-0",
        "rounded-full",
        `w-${this.width}`,
        `h-${this.height}`,
        `bg-${this.color}`,
        "filter",
        "hover:brightness-75",
        "mouse",
        "shadow",
        "transition",
        "ease-in",
        "duration-200",
        "flex",
        "items-center",
        "justify-center",
        "fixed",
        "bottom-4",
        "right-4",
        "md:bottom-8",
        "md:right-8",
        "lg:bottom-16",
        "lg:right-16",
      ];
    },
  },
  created() {
    window.addEventListener('scroll', this.hideElement)
  },
  destroyed() {
    window.removeEventListener('scroll', this.hideElement)
  },
  methods: {
    hideElement() {
      window.scrollY > parseInt(this.offset) ? this.isHide = false : this.isHide = true
    },
  }
};
</script>