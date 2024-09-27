<template>
  <NuxtLink to="/">
    <Icon name="double-arrow-right" />
    <span>Подробнее</span>
  </NuxtLink>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "ButtonDetail"
})
</script>


<style scoped lang="scss">
a {
  width: fit-content;
  display: flex;
  align-items: center;
  gap: 14px;
  color: #006DB1;
  font-family: "Roboto Condensed";
  font-size: 18px;
  line-height: 21.09px;
  text-transform: uppercase;
}
</style>