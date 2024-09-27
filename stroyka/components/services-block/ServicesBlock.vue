<template>
  <div class="box-services">
    <div class="content-width mx-auto">
      <div class="title-block">
        <slot name="title">
          <h1>Услуги</h1>
        </slot>

        <span v-if="$slots.description" class="description">
          <slot name="description" />
        </span>
      </div>
    </div>

    <div class="services-container">
      <div class="content-width mx-auto">
        <ServicesList :enabled-slider="enabledSlider" :services="services" />
      </div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

import {SERVICES} from "~/helpers/constants.js";

export default defineComponent({
  name: "ServicesBlock",
  props: {
    enabledSlider: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    services() {
      return SERVICES
    },
    route() {
      return useRoute()
    },
    isMainPage() {
      return this.route.name === 'index'
    },
  }
})
</script>

<style scoped lang="scss">
.box-services {
  .services-container {
    background: #FFF;
    background: linear-gradient(to bottom, #ffffff 0%, #ffffff 137px, #F6F8F9 10px);
    padding-bottom: 110px;
  }

  .title-block {
    display: flex;
    align-items: center;
    gap: 50px;

    .description {
      color: #484848;
      font-size: 18px;
      line-height: 26px;
    }
  }
}

@media (max-width: 576px) {
  .box-services {
    .title-block {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .services-container {
      padding-bottom: 50px;
    }
  }
}
</style>