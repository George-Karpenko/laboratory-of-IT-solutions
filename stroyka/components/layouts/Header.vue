<template>
  <MobileHeader
      v-if="isMobile"
      :theme="theme"
      :is-fixed="isFixed"
  />

  <ComputerHeader
      v-else
      :theme="theme"
      :is-fixed="isFixed"
  />
</template>

<script>
import {defineComponent} from 'vue'
import {useMainStore} from "~/stores/store.js";
import ComputerHeader from "~/components/layouts/ComputerHeader.vue";

export default defineComponent({
  name: "Header",
  components: {
    ComputerHeader
  },
  props: {
    theme: {
      type: String,
      default: null,
      validator: (value) => [null, 'white'].includes(value)
    },
    isFixed: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    mainStore() {
      return useMainStore()
    },
    isMobile() {
      return this.mainStore.innerWidth <= 1100
    }
  }
})
</script>

<style scoped lang="scss">

</style>