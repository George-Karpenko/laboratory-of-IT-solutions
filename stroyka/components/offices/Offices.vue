<template>
  <div class="box-map">
    <div class="content-width mx-auto">
      <div class="box-title">
        <h2>Наши офисы</h2>

        <Tabs :tabs="tabs" :active-tab="tab" @change="(value) => tab = value" />
      </div>
    </div>

    <img src="~/assets/images/map_2.png" class="map" alt="">
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Offices",
  data() {
    return {
      tab: 'saint_petersburg'
    }
  },
  computed: {
    tabs() {
      return [
        { name: 'Санкт-Петербург', slug: 'saint_petersburg' },
        { name: 'Амурск', slug: 'amursk' },
      ]
    }
  }
})
</script>

<style scoped lang="scss">
.box-map {
  margin-top: 110px;
  display: flex;
  flex-direction: column;
  gap: 60px;

  .box-title {
    display: flex;
    align-items: center;
    gap: 50px;
  }

  .map {
    width: 100%;
    height: 650px;
    object-fit: cover;
  }
}

@media (max-width: 768px) {
  .box-map {
    margin-top: 50px;
    gap: 30px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
    }
  }
}
</style>