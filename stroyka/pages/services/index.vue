<template>
  <div class="content-width mx-auto">
    <Breadcrumbs :items="breadcrumbs" />
  </div>

  <ServicesBlock :enabled-slider="false" />
</template>

<script>
import {defineComponent} from 'vue'
import ServicesList from "~/components/services-list/ServicesList.vue";

export default defineComponent({
  name: "index",
  components: {ServicesList},
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Услуги'},
      ]
    },
  }
})
</script>

<style scoped lang="scss">

</style>