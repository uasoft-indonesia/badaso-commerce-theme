<template>
  <svg
    fill="none"
    :class="[`w-${width} h-${height} animate-spin text-${color}`]"
    viewBox="0 0 32 32"
    xmlns="http://www.w3.org/2000/svg"
  >
    <path
      clip-rule="evenodd"
      d="M15.165 8.53a.5.5 0 01-.404.58A7 7 0 1023 16a.5.5 0 011 0 8 8 0 11-9.416-7.874.5.5 0 01.58.404z"
      fill="currentColor"
      fill-rule="evenodd"
    />
  </svg>
</template>

<script>
export default {
  props: {
    color: [String],
    width: {
      type: String|Number,
      default: "6"
    },
    height: {
      type: String|Number,
      default: "6"
    },
  },
}
</script>