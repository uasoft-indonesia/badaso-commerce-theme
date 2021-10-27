<template>
  <button :class="classes" v-on="$listeners" v-bind="$attrs" >
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    color: {
      type: String,
      default: 'primary'
    },
    height: {
      type: String|Number,
      default: 10
    },
    width: {
      type: String|Number,
      default: 10
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
        "bottom-24",
        "right-24"
      ];
    },
  },
};
</script>