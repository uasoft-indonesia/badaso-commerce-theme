<template>
  <div :class="[`flex-shrink-0 m-0 relative flex justify-center items-center w-full w-full-all h-full-all object-cover`]">
    <slot />
  </div>
</template>

<style lang="scss">
.w-full-all {
  & > * {
    @apply w-full;
  }
}
.h-auto-all {
  & > * {
    @apply w-full;
  }
}
</style>