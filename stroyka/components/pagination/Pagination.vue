<template>
  <div class="pagination">
    <button type="button" class="page arrow">
      <Icon name="arrow-left" @click="change(currentPage - 1)" />
    </button>

    <button
        v-for="page in pages"
        type="button"
        class="page"
        :class="{'active': page === currentPage}"
        @click="change(page)"
    >
      {{ page }}
    </button>

    <button type="button" class="page arrow" @click="change(currentPage + 1)">
      <Icon name="arrow-right" />
    </button>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Pagination",
  emits: ['change'],
  props: {
    pages: {
      type: Array,
      required: true
    },
    currentPage: {
      type: Number,
      required: true
    }
  },
  methods: {
    change(page) {
      if (!this.pages.includes(page)) {
        return
      }

      this.$emit('change', page)
    }
  }
})
</script>

<style scoped lang="scss">
.pagination {
  width: fit-content;
  display: flex;
  align-items: center;
  gap: 10px;

  .page {
    cursor: pointer;
    padding: 0;
    border: none;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #006DB1;
    background-color: transparent;
    font-family: "Roboto Condensed";
    font-size: 18px;

    &.active {
      background-color: #006DB1;
      color: #FFF;
    }

    &.arrow:first-child {
      margin-right: 10px;
    }

    &.arrow:last-child {
      margin-left: 10px;
    }
  }

  @media (max-width: 576px) {
    .page {
      width: 30px;
      height: 30px;
    }
  }
}
</style>