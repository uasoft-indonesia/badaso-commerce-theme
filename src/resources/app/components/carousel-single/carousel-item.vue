<template>
  <div :class="[`flex-shrink-0 m-0 relative flex justify-center items-center w-full w-full-all h-full-all object-cover`]">
    <slot />
  </div>
</template>

<script>
export default {
  created () {
    this.$children.forEach(child => {
      child.classList.add('w-full')
    })
  },
}
</script>
