<template>
  <div class="header-container" :style="{height: fixed ? '60px' : null}">
    <header ref="header" :class="{'open': isOpenMenu, 'fixed': fixed}">
      <Search v-if="mainStore.isOpenSearch" />

      <div v-else class="row-1">
        <button type="button" class="btn-toggle-menu" @click="toggleMenu">
          <Icon v-if="isOpenMenu" name="close-menu" />
          <Icon v-else name="burger-menu" />
        </button>

        <NuxtLink to="/" class="logo">
          <Icon name="logo-3" width="181" height="31" />
        </NuxtLink>

        <button type="button" class="btn-search" @click="mainStore.openSearch">
          <Icon name="search" />
        </button>

        <div v-if="isOpenMenu" class="bottom-line"></div>
      </div>

      <template v-if="isOpenMenu">
        <div class="links-list">
          <NuxtLink to="/services" class="link">Каталог услуг</NuxtLink>
          <NuxtLink to="/" class="link">Каталог продукции</NuxtLink>

          <div class="about-dropdown" :class="{'open': isOpenAboutDropdown}" @click="isOpenAboutDropdown = !isOpenAboutDropdown">
            <button type="button">
              <span>О комнпаии</span>
              <Icon name="arrow-down" class="arrow" />
            </button>

            <div v-if="isOpenAboutDropdown" class="content">
              <NuxtLink to="/about" class="link-dropdown">О нас</NuxtLink>
              <NuxtLink to="/certificates" class="link-dropdown">Сертификаты и лицензии</NuxtLink>
              <NuxtLink to="/team" class="link-dropdown">Сотрудники</NuxtLink>
              <NuxtLink to="/" class="link-dropdown">Реквизиты</NuxtLink>
            </div>
          </div>
          <NuxtLink to="/about" class="link">О компании</NuxtLink>

          <NuxtLink to="/projects" class="link">Наши проекты</NuxtLink>
          <NuxtLink to="/news" class="link">Блог</NuxtLink>
          <NuxtLink to="/contacts" class="link">Контакты</NuxtLink>
        </div>

        <div class="line"></div>

        <div class="contacts">
          <div class="contact">
            <Icon name="geo" />

            <div class="info">
              <div class="title">Адрес</div>
              <div class="value">г. Санкт-Петербург, Ленинский
                пр., д.140А</div>
            </div>
          </div>

          <div class="contact">
            <Icon name="email" />

            <div class="info">
              <div class="title">E-mail</div>
              <div class="value">
                <a href="mailto:info@lstk-home.com" target="_blank">info@lstk-home.com</a>
              </div>
            </div>
          </div>

          <div class="contact">
            <Icon name="phone" />

            <div class="info">
              <div class="title">Главный офис</div>
              <div class="value">
                <a href="tel:+7 (812) 4260-1046" target="_blank">+7 (812) 4260-1046</a>
              </div>
            </div>
          </div>
        </div>
      </template>
    </header>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import {useMainStore} from "~/stores/store.js";

export default defineComponent({
  name: "MobileHeader",
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
      isOpenMenu: false,
      isOpenAboutDropdown: false,
      fixed: false
    }
  },
  computed: {
    routePath() {
      return useRoute().path
    },
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
    toggleMenu() {
      this.isOpenMenu = !this.isOpenMenu
    },
    closeMenu() {
      this.isOpenMenu = false
    },
    updateFixedHeader() {
      if (!this.isFixed || !this.$refs.header) {
        return
      }

      const scrollTop = this.scrollTop
      const headerHeight = this.$refs.header.offsetHeight
      this.fixed = scrollTop > headerHeight
    }
  },
  watch: {
    routePath() {
      this.closeMenu()
    },
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
  overflow-x: hidden;
  max-width: 100%;
  width: 100%;
  height: auto;
  z-index: 100;

  --color-elements: #FFF;

  &.fixed {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
  }

  &.open {
    --color-elements: #006DB1;

    padding-bottom: 40px;
    width: 100%;
    height: 100%;
    position: fixed;
    inset: 0;
    background-color: #FFF;
    display: flex;
    flex-direction: column;
    gap: 40px;

    .row-1 {
      background-color: #FFF;
    }

    .btn-search {
      visibility: hidden;
    }
  }

  .row-1 {
    position: relative;
    min-height: 60px;
    height: 60px;
    padding: 0 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #006DB1E5;

    .bottom-line {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 1px;
      width: calc(100% - 40px);
      margin: 0 auto;
      background-color: #E0E8EC;
    }
  }

  .btn-toggle-menu {
    min-width: 24px;
    width: 24px;
    height: 24px;
    display: flex;
    justify-content: center;
    align-content: center;
    padding: 0;
    border: none;
    background-color: transparent;
    color: var(--color-elements);
  }

  .logo {
    color: var(--color-elements);
  }

  .btn-search {
    min-width: 24px;
    width: 24px;
    height: 24px;
    display: flex;
    justify-content: center;
    align-content: center;
    padding: 0;
    border: none;
    background-color: transparent;
    color: var(--color-elements);

    svg {
      width: 24px;
      height: 24px;
    }
  }

  .links-list {
    padding: 0 20px;
    display: flex;
    flex-direction: column;
    gap: 30px;

    .link {
      font-size: 18px;
      line-height: 21.09px;
      color: #171717;
      font-family: "Roboto Condensed";
      text-transform: uppercase;
    }
  }

  .about-dropdown {
    display: flex;
    flex-direction: column;
    gap: 20px;

    &.open {
      .arrow {
        transform: rotate(180deg);
      }

      button {
        color: #006DB1;
      }
    }

    button {
      background-color: transparent;
      display: flex;
      align-items: center;
      gap: 7px;
      color: #171717;
      padding: 0;
      border: none;
      font-size: 18px;
      line-height: 21.09px;
      font-family: "Roboto Condensed";
      text-transform: uppercase;
    }

    .content {
      display: flex;
      flex-direction: column;
      gap: 13px;

      .link-dropdown {
        color: #006DB1;
        font-size: 16px;
        line-height: 24px;
        display: flex;
        align-items: center;
        gap: 13px;

        &:before {
          content: '» ';
        }
      }
    }
  }

  .line {
    margin: 0 auto;
    min-height: 1px;
    height: 1px;
    width: calc(100% - 40px);
    background-color: #E0E8EC;
  }

  .contacts {
    display: flex;
    flex-direction: column;
    gap: 10px;

    .contact {
      padding: 0 20px;
      display: flex;
      gap: 18px;

      svg {
        color: #006DB1;
        width: 18px;
        min-width: 18px;
      }

      .info {
        display: flex;
        flex-direction: column;
        gap: 4px;

        .title {
          font-size: 14px;
          line-height: 17.07px;
          color: #838383;
        }

        .value {
          color: #171717;
          font-size: 14px;
          line-height: 20px;

          a {
            color: #171717;
          }
        }
      }
    }
  }
}
</style>