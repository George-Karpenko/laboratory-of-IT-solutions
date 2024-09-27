<template>
  <button type="button" class="btn-outline">
    <slot />
  </button>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "ButtonOutline"
})
</script>

<style scoped lang="scss">
.btn-outline {
  cursor: pointer;
  height: 60px;
  padding: 0 40px;
  background-color: transparent;
  border: 2px solid #FFFFFF;
  display: flex;
  align-items: center;
  justify-content: center;
  text-transform: uppercase;
  color: #FFFFFF;
  font-size: 18px;
  font-family: "Roboto Condensed";

  &:hover {
    transition: .3s all ease-out;
    background-color: #FFF;
    color: #006DB1;
  }
}

@media (max-width: 576px) {
  .btn-outline {
    height: 50px;
  }
}
</style>