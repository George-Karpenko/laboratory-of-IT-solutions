<template>
  <div class="box-technologies-slider mt-50 mb-50 pb-50 d-flex flex-column gap-25">
    <div class="content-width mx-auto">
      <div class="d-flex flex-column gap-6">
        <h2>Технологии</h2>
        <p class="text-gray">В своей работе мы используем только лучшее и современное оборудование</p>
      </div>
    </div>

    <div class="content-width mx-auto swiper-container">
      <div ref="swiper" class="swiper">
        <div ref="swiper-wrapper" class="swiper-wrapper">
          <TechnologyCard
              v-for="technology in technologies"
              :technology="technology"
              class="swiper-slide"
          />
        </div>
      </div>

      <div ref="swiper-pagination" class="swiper-pagination"></div>
    </div>

    <div v-if="!hideDescription" class="content-width mx-auto">
      <p class="text-gray fs-14">В своей работе мы используем только современное оборудование. В своей работе мы используем только лучшее оборудование.  В своей работе мы используем только современное оборудование. </p>

      <ButtonDetail class="mt-15" />
    </div>

  </div>
</template>
<script>
import {defineComponent} from 'vue'
import {TECHNOLOGIES} from "~/helpers/constants.js";
import Swiper from "swiper";
import {Pagination} from "swiper/modules";

export default defineComponent({
  name: "TechnologiesSlider2",
  props: {
    hideDescription: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    technologies() {
      return TECHNOLOGIES
    }
  },
  mounted() {
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
  },
  beforeUnmount() {
    this.swiper.destroy()
  },
  data() {
    return {
      swiper: null
    }
  }
})
</script>


<style scoped lang="scss">
.box-technologies-slider {
  background-image: url(~/assets/images/technologies_bg.png);
  background-size: cover;

  .swiper-pagination {
    position: relative !important;
    margin-top: 20px !important;
    inset: initial !important;
  }
}
</style>