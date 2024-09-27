<template>
  <div ref="box" class="box-about-dropdown" @click.stop="toggleDropdown">
    <a href="#" ref="a" class="link" :class="{'active': isShow}" @click.prevent>
      <span>О компании</span>
      <Icon name="arrow-down" class="arrow" />

      <span class="line"></span>
    </a>

    <div v-show="isShow" ref="dropdown" class="about-dropdown" v-click-outside:high="closeDropdown" @click.stop>
      <NuxtLink to="/about" class="link">О нас</NuxtLink>
      <NuxtLink to="/certificates" class="link">Сертификаты и лицензии</NuxtLink>
      <NuxtLink to="/team" class="link">Сотрудники</NuxtLink>
      <NuxtLink to="/" class="link">Реквизиты</NuxtLink>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import {createPopper} from '@popperjs/core';

export default defineComponent({
  name: "AboutDropdown",
  data() {
    return {
      popper: null,
      lineWidth: null,
      isShow: false
    }
  },
  mounted() {
    this.popper = createPopper(this.$refs.box, this.$refs.dropdown, {
      placement: 'bottom-start',
      strategy: 'fixed'
    })
  },
  computed: {
    innerWidth() {
      const state = useMainStore()
      return state.innerWidth
    },
    route() {
      return useRoute()
    },
    routePath() {
      return this.route.path
    }
  },
  methods: {
    handleResize() {

    },
    toggleDropdown() {
      this.isShow = !this.isShow
    },
    closeDropdown(e) {
      if (!this.isShow) {
        return
      }


      if (e && (e.target === this.$refs.box || this.$refs.box.contains(e.target))) {
        return
      }

      this.isShow = false
    },
  },
  watch: {
    innerWidth() {
      this.handleResize()
    },
    isShow(newVal) {
      if (newVal && this.popper) {
        this.$nextTick(() => {
          this.popper.update()
        })
      }
    },
    routePath() {
      this.closeDropdown()
    }
  }
})
</script>

<style scoped lang="scss">
.link {
  position: relative;
  height: 60px;
  display: flex;
  align-items: center;
  color: #FFF;
  text-transform: uppercase;
  white-space: nowrap;
  font-size: 18px;
  gap: 8px;
  font-family: "Roboto Condensed";

  &.active {
    .line {
      display: block;
    }

    .arrow {
      transform: rotate(180deg);
    }
  }

  .line {
    display: none;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    height: 2px;
    background-color: #FFA800;
  }
}

.about-dropdown {
  position: relative;
  padding: 25px 30px;
  box-shadow: 0px 4px 25px 0px #395E761A;
  background-color: #FFF;
  display: flex;
  flex-direction: column;
  gap: 13px;

  .link {
    height: 24px;
    display: flex;
    align-items: center;
    color: #171717;
    font-size: 14px;

    &:before {
      content: '» ';
      color: #006DB1;
      margin-right: 15px;
    }
  }
}

@media (max-width: 1100px) {
  .link {
    height: auto;
  }
}
</style>