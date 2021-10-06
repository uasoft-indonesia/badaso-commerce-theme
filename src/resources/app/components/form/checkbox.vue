<template>
  <input v-on="listeners" v-bind="$attrs" :checked="isChecked || $attrs.checked" type="checkbox" :class="[`h-4 w-4 focus:ring-${color} focus:outline-none rounded-sm text-${color} form-checkbox`]" :value="value">
</template>

<script>
export default {
  inheritAttrs: false,
  props: {
    value: {},
    color: {
      type: String,
      default: 'primary'
    },
    valueType:{
      type: Boolean|Array|String|Number|Object,
      default:false
    },
  },
  computed:{
    style_check() {
      return {
        background: this.isChecked ? _color.getColor(this.color, 1) : null,
      }
    },
    style() {
      return {
        border: `2px solid ${this.isChecked ? _color.getColor(this.color, 1) : 'rgb(180, 180, 180)'}`,
      }
    },
    listeners() {
      return {
        // ...this.$listeners,
        change: (evt) => {
          this.toggleValue(evt)
        },
        // input: (evt) => {
        //   this.toggleValue(evt)
        // }
      }
    },
    isChecked() {
      return this.isArrayx() ? this.isArrayIncludes() : this.value
    },
  },
  methods:{
    giveColor(color) {
      return _color.rColor(color)
    },
    toggleValue(evt) {
      if(this.isArrayx()) {
        this.setArray()
      } else if (typeof(this.valueType) == 'string') {
        this.setValueString()
      }
      else {
        this.$emit('input', !this.value)
        this.$emit('change', evt)
      }
    },
    setArray() {
      // Copy Array
      const value = this.value.slice(0)
      if(this.isArrayIncludes()) {
        value.splice(value.indexOf(this.valueType), 1)
        this.$emit('input', value)
        this.$emit('change', value)
      } else {
        value.push(this.valueType)
        this.$emit('input', value)
        this.$emit('change', value)
      }
    },
    setValueString() {
      if(this.value == this.valueType) {
        this.$emit('input', null)
        this.$emit('change', null)
      } else {
        this.$emit('input', this.valueType)
        this.$emit('change', this.valueType)
      }
    },
    isArrayIncludes() {
      let modelx = this.value
      let value = this.valueType
      return modelx.includes(value)
    },
    isArrayx() {
      return Array.isArray(this.value)
    }
  }
}
</script>