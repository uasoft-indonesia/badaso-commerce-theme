<template>
  <div :class="[disabled ? `opacity-60 select-none pointer-events-none` : '', `grid container gap-${gap} auto-rows-auto relative`]">
    <slot />
  </div>
</template>

<script>
export default {
  props: {
    disabled: {
      type: Boolean,
      required: false,
      default: false
    },
    gap: {
      type: Number|String,
      required: false,
      default: 1
    }
  },
}
</script>
