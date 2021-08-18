<template>
  <div class="flex items-center">
    <input :id="data" type="radio" v-bind="{ ...$attrs, ...$props }" :checked="isChecked" v-on="listeners" :value="value" :class="[`text-${color} w-5 h-5 form-radio focus:outline-none focus:ring-0 focus:border-none focus:ring-offset-0 cursor-pointer`]" />
    <label :for="data" v-if="label" class="text-sm cursor-pointer pl-1">{{ label }}</label>
  </div>
</template>

<script>
export default {
  name: "VsRadio",
  inheritAttrs: false,
  props: {
    value: {},
    data: {},
    color: {
      default: "primary",
      type: String,
    },
    label: {
      type: String,
      required: false
    }
  },
  computed: {
    listeners() {
      return {
        ...this.$listeners,
        input: () => this.$emit("input", this.data),
        click: () => this.$emit("input", this.data),
      };
    },
    attrs() {
      let attrsx = JSON.parse(JSON.stringify(this.$attrs));
      return {
        attrsx,
      };
    },
    isChecked() {
      return this.data == this.value;
    },
  },
};
</script>