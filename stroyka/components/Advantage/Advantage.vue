<template>
  <div class="advantage">
    <div class="advantage-icon">
      <Icon :name="advantage.icon" />
    </div>

    <div class="advantage-content">
      <div class="title">{{ advantage.name }}</div>
      <div class="description">{{ advantage.description }}</div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Advantage",
  props: {
    advantage: {
      type: Object,
      required: true
    }
  }
})
</script>

<style scoped lang="scss">
.advantage {
  width: 283px;
  display: flex;
  gap: 25px;

  .advantage-icon {
    flex: 0 0 62px;
    width: 62px;
    height: 62px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    color: #006DB1;
  }

  .advantage-content {
    display: flex;
    flex-direction: column;
    gap: 7px;

    .title {
      font-size: 18px;
      line-height: 26px;
      color: #171717;
      font-family: "Roboto Condensed";
      text-transform: uppercase;
    }

    .description {
      font-size: 14px;
      line-height: 20px;
      color: #484848;
    }
  }
}
</style>