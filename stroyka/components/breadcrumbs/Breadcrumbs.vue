<template>
  <ol class="breadcrumbs">
    <li v-for="(item, index) in items">
      <NuxtLink
          :to="item.to"
          :class="{'active': index === items.length - 1}"
      >
        {{ item.name }}
      </NuxtLink>
    </li>
  </ol>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Breadcrumbs",
  props: {
    items: {
      type: Array,
      required: true
    }
  }
})
</script>

<style lang="scss" scoped>
.breadcrumbs {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  gap: 0 20px;
  list-style-type: none;
  padding: 0;
  margin: 70px 0 0;
  --color: #5F5F5F;
  --active-color: #838383;
  --shash-color: #006DB1;

  &.white {
    --color: #FFF;
    --active-color: #9AC2DB;
    --shash-color: #FFF;
  }

  li {
    &:not(:last-child) {
      &:after {
        padding-left: 20px;
        content: '/';
        color: var(--shash-color);
        font-size: 10.75px;
      }
    }

    a {
      font-size: 14px;
      color: var(--color);

      &.active {
        color: var(--active-color);
      }
    }
  }
}

@media (max-width: 576px) {
  .breadcrumbs {
    margin-top: 30px;
  }
}
</style>