<template>
  <header ref="header" :class="[theme, {'fixed': fixed}]">
    <div class="content-width mx-auto">
      <div class="row-1">
        <div>
          <NuxtLink to="/" class="link-logo">
            <Icon name="logo" />
          </NuxtLink>
        </div>

        <div class="contacts">
          <div class="item">
            <Icon name="geo" />

            <div class="info">
              <span class="title">Адрес</span>
              <span class="value">г. Санкт-Петербург, Ленинский пр., д.140А</span>
            </div>
          </div>

          <div class="item">
            <Icon name="email" />

            <div class="info">
              <span class="title">E-mail</span>
              <a href="mailto:info@lstk-home.com" target="_blank" class="value">info@lstk-home.com</a>
            </div>
          </div>

          <div class="item">
            <Icon name="phone" />

            <div class="info">
              <span class="title">Главный офис</span>
              <a href="tel:+7 (812) 4260-1046" target="_blank" class="value">+7 (812) 4260-1046</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row-2">
      <div class="content-width mx-auto">
        <Search v-if="mainStore.isOpenSearch" />

        <template v-else>
          <NuxtLink to="/services" class="link">Каталог услуг</NuxtLink>
          <NuxtLink to="/" class="link">Каталог продукции</NuxtLink>

          <AboutDropdown />

          <NuxtLink to="/projects" class="link">Наши проекты</NuxtLink>
          <NuxtLink to="/news" class="link">Блог</NuxtLink>
          <NuxtLink to="/contacts" class="link">Контакты</NuxtLink>

          <div class="search-block">
            <button type="button" @click="mainStore.openSearch">
              <Icon name="search" />
            </button>
          </div>
        </template>
      </div>
    </div>

    <div v-if="fixed" class="fixed-header">
      <div class="content-width mx-auto">
        <Search v-if="mainStore.isOpenSearch" />

        <template v-else>
          <NuxtLink to="/" class="link-logo">
            <Icon name="logo-3" />
          </NuxtLink>

          <NuxtLink to="/services" class="link">Каталог услуг</NuxtLink>
          <NuxtLink to="/" class="link">Каталог продукции</NuxtLink>

          <AboutDropdown />

          <NuxtLink to="/projects" class="link">Наши проекты</NuxtLink>
          <NuxtLink to="/news" class="link">Блог</NuxtLink>
          <NuxtLink to="/contacts" class="link">Контакты</NuxtLink>

          <div class="search-block">
            <button type="button" @click="mainStore.openSearch">
              <Icon name="search" />
            </button>
          </div>
        </template>
      </div>
    </div>
  </header>
</template>

<script>
import {defineComponent} from 'vue'
import {useMainStore} from "~/stores/store.js";

export default defineComponent({
  name: "ComputerHeader",
  props: {
    theme: {
      type: String,
      default: null,
      validator: (value) => [null, 'white'].includes(value)
    },
    isFixed: {
      type: Boolean,
      default: false
    }
  },
  mounted() {
    this.updateFixedHeader()
  },
  data() {
    return {
      fixed: false
    }
  },
  computed: {
    mainStore() {
      return useMainStore()
    },
    innerWidth() {
      return this.mainStore.innerWidth
    },
    scrollTop() {
      return this.mainStore.scrollTop
    }
  },
  methods: {
    updateFixedHeader() {
      if (!this.isFixed || !this.$refs.header) {
        return
      }

      const scrollTop = this.mainStore.scrollTop
      const headerHeight = this.$refs.header.offsetHeight
      this.fixed = scrollTop > headerHeight
    }
  },
  watch: {
    innerWidth() {
      this.updateFixedHeader()
    },
    scrollTop() {
      this.updateFixedHeader()
    }
  }
})
</script>

<style scoped lang="scss">
header {
  --link-logo-color: #006DB1;
  --contacts-svg-color: #006DB1;
  --contacts-title-color: #838383;
  --contacts-value-color: #171717;
  --contacts-value-hover-color: #006DB1;
  --bg-row-2: #006DB1;

  &.white {
    --link-logo-color: #FFF;
    --contacts-svg-color: #FFF;
    --contacts-title-color: #9AC2DB;
    --contacts-value-color: #FFF;
    --contacts-value-hover-color: #FFA800;
    --bg-row-2: #FFFFFF1A;
  }

  .row-1 {
    height: 150px;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .link-logo {
      display: flex;
      align-items: center;
      height: 100%;
      color: var(--link-logo-color);
    }

    .contacts {
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 60px;

      .item {
        display: flex;
        gap: 18px;

        svg {
          margin-top: 5px;
          color: var(--contacts-svg-color);
        }

        .info {
          display: flex;
          flex-direction: column;
          gap: 4px;

          .title {
            color: var(--contacts-title-color);
            font-size: 14px;
          }

          .value {
            color: var(--contacts-value-color);
            font-size: 18px;
            font-family: "Roboto Condensed";
            white-space: nowrap;
          }

          a.value {
            transition: .3s ease-in-out all;

            &:hover {
              color: var(--contacts-value-hover-color);
            }
          }
        }
      }
    }
  }

  .row-2 {
    height: 60px;
    background-color: var(--bg-row-2);

    & > div {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 78px;
    }
  }

  .link {
    height: 60px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #FFF;
    text-transform: uppercase;
    font-family: "Roboto Condensed";
    font-size: 18px;
    white-space: nowrap;
  }

  .search-block {
    width: 60px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;

    button {
      cursor: pointer;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      background-color: transparent;
      border: none;

      svg {
        width: 20px;
        min-width: 20px;
        height: 20px;
        color: #FFFFFF;
      }
    }
  }

  .fixed-header {
    z-index: 100;
    background-color: #006DB1E5;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    height: 60px;

    .link-logo {
      color: #FFF;
    }

    & > div {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }
  }
}

@media (max-width: 1280px) {
  header {
    .row-1 {
      .contacts {
        gap: 30px;
      }
    }
  }
}
</style>