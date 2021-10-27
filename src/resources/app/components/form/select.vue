<template>
  <div class="w-full relative flex flex-wrap">
    <div class="relative w-full">
      <input type="text" tabindex="-1" :value="selected.text" v-bind="{ ...$attrs, ...$props }" v-on="listeners" :placeholder="placeholder" :class="inputClasses">
      <div :class="inputOverlayClasses" @click="show = !show">
        <svg xmlns="http://www.w3.org/2000/svg" :class="iconClasses" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 9l-7 7-7-7" />
        </svg>
      </div>
    </div>
    <transition
      enter-active-class="transition-all duration-200 ease-in"
      leave-active-class="transition-all duration-200 ease-in"
      enter-class="opacity-0"
      leave-to-class="opacity-0"
    >
      <div v-show="show && items.length > 0" class="absolute top-full border border-t-0 shadow-sm rounded-md rounded-t-none border-gray-200 bg-white z-40 w-full left-0 max-h-64 overflow-y-auto">
        <div class="flex flex-col w-full">
          <div :class="['cursor-pointer transition-colors ease-in-out duration-150 border-l-4 border-transparent flex w-full items-center p-2 relative', item.value === value ? 'border-blue-300 hover:border-blue-300' : 'hover:border-blue-200']" @click="emit(item)" v-for="item, index in items" :key="index">
            <span class="text-sm text-gray-700">{{ item.text }}</span>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>

<script>
export default {
  props: {
    value: {},
    placeholder: [String],
    items: {
      type: Array,
      default: () => []
    },
  },
  data() {
    return {
      show: false,
      selected: {
        value: null,
        text: null,
      }
    };
  },
  computed: {
    iconClasses() {
      return [
        'h-5 w-5 mr-2 text-gray-700 transform transition-transform duration-200 ease-in-out',
        this.show ? 'rotate-180' : ''
      ]
    },
    inputClasses() {
      return [
        'w-full border p-2 text-sm focus:outline-none transition-all select-none form-input border-gray-200 rounded-md focus:ring-0 focus:border-primary cursor-pointer',
        this.show ? 'rounded-b-none' : ''
      ]
    },
    inputOverlayClasses() {
      return [
        'w-full h-full absolute hover:shadow-inner z-10 inset-0 flex-row-reverse bg-transparent cursor-pointer rounded-md flex items-center',
        this.show ? 'rounded-b-none' : ''
      ]
    },
    listeners() {
      return {
        ...this.$listeners,
      };
    },
  },
  watch: {
    value: {
      handler(val) {
        let item = this.$_.find(this.items, { value: val })
        this.selected = { ...item }
      }
    }
  },
  methods: {
    emit(item) {
      this.show = false
      this.selected = {...item}
      this.$emit('input', item.value);
    }
  }
};
</script>