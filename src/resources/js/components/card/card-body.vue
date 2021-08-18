<template>
  <div :class="[`bg-${color} rounded-${radius}`, noGutter ? 'p-0' : 'p-4']">
    <slot/>
  </div>
</template>

<script>
export default {
  props: {
    color: {
      type: String,
      required: false,
      default: 'white'
    },
    radius: {
      type: String,
      required: false,
      default: 'xl'
    },
    shadow: {
      type: String,
      required: false,
      default: 'none'
    },
    noGutter: {
      type: Boolean,
      required: false,
      default: false
    }
  }
}
</script>