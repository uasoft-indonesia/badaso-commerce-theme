<template>
  <img :src="image" alt="Logo Theme" width="200">
</template>

<script>
import { mapState } from 'vuex'
export default {
  computed: mapState({
    image (state) {
      return _.find(state.themeConfigurations, { key: "logoTextTheme" }).value
    }
  })
}
</script>
