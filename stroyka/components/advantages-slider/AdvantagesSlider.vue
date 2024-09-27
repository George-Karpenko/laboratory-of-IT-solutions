<template>
  <div v-if="innerWidth <= 1280" class="swiper-container">
    <div ref="swiper" class="swiper">
      <div ref="swiper-wrapper" class="swiper-wrapper">
        <Advantage v-for="advantage in advantages" :advantage="advantage" class="swiper-slide" />
      </div>
      <div ref="swiper-pagination" class="swiper-pagination"></div>
    </div>
  </div>

  <div v-else class="advantages">
    <Advantage v-for="advantage in advantages" :advantage="advantage" />
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import {ADVANTAGES} from "~/helpers/constants.js";
import Advantage from "~/components/Advantage/Advantage.vue";
import Swiper from "swiper";
import {Pagination} from "swiper/modules";

export default defineComponent({
  name: "AdvantagesSlider",
  components: {
    Advantage
  },
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
  computed: {
    innerWidth() {
      return useMainStore().innerWidth
    },
    advantages() {
      return ADVANTAGES
    }
  },
  methods: {
    updateSlider() {
      if (this.innerWidth > 1280 && this.swiper) {
        this.swiper.destroy()
        this.swiper = null
      } else if (this.innerWidth <= 1280 && !this.swiper) {
        this.swiper = new Swiper(this.$refs.swiper, {
          slidesPerView: 1.2,
          spaceBetween: 20,
          pagination: {
            el: this.$refs["swiper-pagination"]
          },
          modules: [
              Pagination
          ],
          breakpoints: {
            576: {
              slidesPerView: 2.2,
            },
            992: {
              slidesPerView: 3.2
            }
          }
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
.advantages {
  margin-top: 220px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
}

.swiper-container {
  margin-top: 50px;
  padding-left: 20px;

  .swiper-pagination {
    position: relative !important;
    margin-top: 20px !important;
    inset: initial !important;
  }
}
</style>