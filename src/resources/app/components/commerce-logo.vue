<template>
  <img :src="image" alt="Logo Theme" width="200">
</template>

<script>
import { mapState } from 'vuex'
export default {
  props: {
    dark: Boolean
  },
  computed: mapState({
    image (state) {
      return this.dark 
        ? _.find(state.themeConfigurations, { key: "logoTextDarkTheme" }).value
        : _.find(state.themeConfigurations, { key: "logoTextLightTheme" }).value
    },
  })
}
</script>
