<template>
  <div class="flex flex-nowrap" :class="[disabled ? 'pointer-events-none opacity-70' : '']">
    <button class="w-8 h-8 flex items-center justify-center border rounded-l-md focus:outline-none" @click="subtract">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
      </svg>
    </button>
    <input type="text" :disabled="textDisabled" :value="value" v-bind="{...$attrs}" v-on="listeners" class="bg-white border-t border-b w-12 h-8 text-center focus:outline-none">
    <button class="w-8 h-8 flex items-center justify-center border rounded-r-md focus:outline-none" @click="add">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: Number|String,
      required: true,
    },
    max: {
      type: Number|String,
      required: false,
      default: undefined
    },
    min: {
      type: Number|String,
      required: false,
      default: undefined
    },
    step:{
      default:1,
      type:[Number,String]
    },
    textDisabled: [Boolean],
    disabled: [Boolean],
  },
  computed: {
    listeners(){
      return {
        ...this.$listeners,
        input: (event) => {
          this.$emit('input', event.target.value)
        },
        blur: (event)=>{
          if(parseInt(this.value) > parseInt(this.max)) {
            this.$emit('input', this.max)
          } else if (parseInt(this.value) < parseInt(this.min)) {
            this.$emit('input', this.min)
            this.$emit('blur', event)
          }
        },
      }
    },
  },
  methods: {
    add() {
      this.$emit('add', this.value)
      let newValue
      if(this.value === ''){
        newValue = 0
        this.$emit('input', newValue)
      } else  {
        if(this.max !== undefined ? parseInt(this.value) < parseInt(this.max) : true){
          newValue = parseInt(this.value) + parseInt(this.step)
          this.$emit('input', newValue)
        }
      }
    },
    subtract() {
      this.$emit('subtract', this.value)
      let newValue
      if(this.value === ''){
        newValue = 0
        this.$emit('input', newValue)
      } else  {
        if(this.min !== undefined ? parseInt(this.value) > parseInt(this.min) : true){
          newValue = parseInt(this.value) - parseInt(this.step)
          this.$emit('input', newValue)
        }
      }
    },
  }
}
</script>