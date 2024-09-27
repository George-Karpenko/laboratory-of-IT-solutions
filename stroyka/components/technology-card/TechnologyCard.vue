<template>
  <div class="technology-card">
    <img :src="technology.image" alt="">
    <div class="name">{{ technology.name }}</div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "TechnologyCard",
  props: {
    technology: {
      type: Object,
      required: true
    }
  }
})
</script>

<style scoped lang="scss">
.technology-card {
  position: relative;

  img {
    width: 100%;
    height: auto;
  }

  .name {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100px;
    padding: 35px 30px;
    color: #171717;
    font-size: 24px;
    line-height: 30px;
    font-family: "Roboto Condensed";
    background: #FFF;
  }
}

@media (max-width: 576px) {
  .technology-card {
    .name {
      padding: 10px 20px;
      height: auto;
      font-size: 18px;
      line-height: 24px;
    }
  }
}
</style>