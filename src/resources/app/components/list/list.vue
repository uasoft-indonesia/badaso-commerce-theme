<template>
  <div class="flex flex-wrap w-full divide-y overflow-y-auto">
    <slot name="item" :data="{item, key}" v-for="item, key in items" />
  </div>
</template>

<script>
export default {
  props: {
    items: [Array, Object]
  }
}
</script>