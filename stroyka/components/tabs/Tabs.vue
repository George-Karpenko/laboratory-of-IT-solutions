<template>
  <div class="tabs">
    <div
        v-for="tab in tabs"
        :key="tab.slug"
        class="tab"
        :class="{'active': activeTab === tab.slug}"
        role="button"
        tabindex="0"
        @click="$emit('change', tab.slug)"
    >
      {{ tab.name }}
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Tabs",
  emits: ['change'],
  props: {
    tabs: {
      type: Array,
      required: true
    },
    activeTab: {
      type: String,
      required: true
    }
  },
})
</script>

<style scoped lang="scss">
.tabs {
  width: fit-content;
  display: flex;
  gap: 10px;
  overflow-x: auto;
  max-width: 100%;

  .tab {
    cursor: pointer;
    position: relative;
    padding: 10.5px 15px;
    font-family: "Roboto Condensed";
    font-size: 16px;
    text-transform: uppercase;
    border: 2px solid #006DB1;
    color: #006DB1;
    margin-bottom: 11px;
    white-space: nowrap;

    &.active {
      background-color: #006DB1;
      color: #FFFFFF;

      &:after {
        content: '';
        position: absolute;
        top: 100%;
        left: calc(50% - 11.5px);
        background-color: #006DB1;
        width: 23px;
        height: 11px;
        clip-path: polygon(0 0, 100% 0, 50% 100%);
      }
    }
  }
}
</style>