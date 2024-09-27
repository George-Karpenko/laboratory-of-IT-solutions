<template>
  <div v-if="isMobile && enabledSlider" class="swiper-container">
    <div ref="swiper" class="swiper">
      <div ref="swiper-wrapper" class="swiper-wrapper">
        <ServiceCard
            v-for="service in services"
            :key="service.name"
            :service="service"
            class="swiper-slide"
        />
      </div>
    </div>

    <div ref="swiper-pagination" class="swiper-pagination"></div>
  </div>

  <div v-else class="services-list">
    <ServiceCard
        v-for="service in services"
        :key="service.name"
        :service="service"
    />
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Pagination} from "swiper/modules";

export default defineComponent({
  name: "ServicesList",
  mounted() {
    this.updateSlider()
  },
  beforeUnmount() {
    if (this.swiper) {
      this.swiper.destroy()
    }
  },
  data() {
    return {
      swiper: null
    }
  },
  props: {
    services: {
      type: Array,
      required: true
    },
    enabledSlider: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    isMobile() {
      return this.innerWidth <= 576
    },
    innerWidth() {
      return useMainStore().innerWidth
    }
  },
  methods: {
    updateSlider() {
      if (!this.isMobile && this.swiper) {
        this.swiper.destroy()
        this.swiper = null
      } else if (this.isMobile && this.enabledSlider && !this.swiper) {
        this.swiper = new Swiper(this.$refs.swiper, {
          slidesPerView: 1.1,
          spaceBetween: 20,
          pagination: {
            el: this.$refs["swiper-pagination"]
          },
          modules: [
            Pagination
          ],
        })
      }
    }
  },
  watch: {
    innerWidth() {
      this.$nextTick(this.updateSlider)
    }
  }
})
</script>

<style scoped lang="scss">
.services-list {
  margin-top: 60px;
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

@media (max-width: 576px) {
  .services-list {
    margin-top: 25px;
  }
}

.swiper-container {
  margin-top: 25px;
}

.swiper-wrapper {
  display: flex;
}

.swiper-pagination {
  position: relative !important;
  margin-top: 20px !important;
  inset: initial !important;
}
</style>