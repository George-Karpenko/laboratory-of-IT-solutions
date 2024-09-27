<template>
  <div class="search">
    <div class="input">
      <input type="search" placeholder="Поиск" class="input-search">

      <Icon name="search" class="icon-search" />
    </div>

    <button type="button" class="btn-close" @click="mainStore.closeSearch()">
      <Icon name="close-menu" />
    </button>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Search",
  computed: {
    mainStore() {
      return useMainStore()
    }
  }
})
</script>

<style scoped lang="scss">
.search {
  min-width: 0;
  width: 100%;
  display: flex;
  align-items: center;
  gap: 30px;

  .btn-close {
    flex: 0 0 20px;
    cursor: pointer;
    padding: 0;
    background-color: transparent;
    border: none;
    display: flex;
    justify-content: center;
    align-items: center;

    svg {
      min-width: 20px;
      width: 20px;
      height: 20px;
      color: #FFF;
    }
  }

  .input {
    min-width: 0;
    flex: 1 1 auto;
    height: 50px;
    background-color: #FFFFFF;
    border: 1px solid #E0E8EC;
    padding: 0 25px;
    display: flex;
    align-items: center;
    gap: 20px;

    .input-search {
      padding: 0;
      flex: 1 1 auto;
      outline: none;
      border: none;
      font-size: 16px;
      line-height: 24px;
      font-family: "Montserrat";

      &::placeholder {
        color: #484848;
      }
    }

    .icon-search {
      flex: 0 0 20px;
      color: #006DB1;
    }
  }
}

@media (max-width: 1100px) {
  .search {
    height: 60px;
    padding: 0 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #006DB1;
    gap: 20px;

    .input {
      .input-search {
        min-width: 0;
      }
    }
  }
}
</style>