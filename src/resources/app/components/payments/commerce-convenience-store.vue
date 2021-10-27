<template>
  <div class="ml-4 flex gap-6 flex-wrap">
    <component
      class="flex items-center gap-4 cursor-pointer w-full"
      v-model="v"
      :is="option.slug"
      v-for="(option, index) in sortedOptions"
      @checkout="$emit('checkout', $event)"
      :key="index"
      :option="option"
    >
      <radio v-model="value" name="transfer-bank" :data="option.slug" />
      <div class="border p-2 ml-2 rounded">
        <img
          :src="option.image"
          alt=""
          class="h-6 w-6 object-contain object-center"
        />
      </div>
      <div class="flex flex-wrap">
        <div class="w-full text-sm">{{ option.name }}</div>
        <div class="w-full text-sm text-gray-400">
          {{ option.description }}
        </div>
      </div>
    </component>
  </div>
</template>

<script>
export default {
  data() {
    return {
      v: null,
    };
  },
  props: {
    value: String,
    options: {
      type: Array,
      required: true,
    },
    active: String,
  },
  computed: {
    sortedOptions() {
      return this.$_.sortBy(this.options, ['order'], ['asc'])
    }
  },
  mounted() {
    this.v = this.value;
  },
  watch: {
    v: {
      handler(val) {
        this.$emit("input", val);
      },
    },
    value: {
      handler(val) {
        this.v = val;
      },
    },
  },
};
</script>