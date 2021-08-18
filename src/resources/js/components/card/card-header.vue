<template>
  <div :class="[`bg-${color} p-4 rounded-${radius} shadow-${shadow} font-semibold flex items-center text-${textColor} tracking-wide uppercase`]" v-bind="{...$props, ...$attrs}">
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
    textColor: {
      type: String,
      default: 'gray-500'
    }
  }
}
</script>