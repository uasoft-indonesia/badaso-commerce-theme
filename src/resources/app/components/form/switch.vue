<template>
  <div
    :class="{ 'bg-primary': value }"
    class="w-10 h-6 flex items-center bg-gray-300 rounded-full mx-3 px-1"
    @click="handleToggleActive"
  >
    <div
      class="bg-white w-4 h-4 rounded-full shadow-md transform transition-all duration-100 ease-in-out"
      :class="{ 'translate-x-4': value }"
    />
  </div>
</template>

<script>
export default {
  name: "VtSwitch",
  props: {
    value: {
      type: Boolean,
      default: false,
    },
  },
  methods: {
    handleToggleActive() {
      this.$emit("input", !this.value);
    },
  },
};
</script>