<template>
  <div class="technologies-container">
    <div class="content-width mx-auto box-technologies">
      <h3 class="with-icon">Какие технологии мы использовали</h3>

      <div class="swiper-container">
        <div ref="swiper" class="swiper">
          <div ref="swiper-wrapper" class="swiper-wrapper">
            <TechnologyCard
                v-for="technology in technologies"
                :technology="technology"
                class="swiper-slide"
            />
          </div>
        </div>

        <div ref="prev" class="swiper-button-prev" role="button" tabindex="0">
          <Icon name="arrow-left" />
        </div>

        <div ref="next" class="swiper-button-next" role="button" tabindex="0">
          <Icon name="arrow-right" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Navigation} from "swiper/modules";
import {TECHNOLOGIES} from "~/helpers/constants.js";

export default defineComponent({
  name: "TechnologiesSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 2,
      spaceBetween: 20,
      navigation: {
        nextEl: this.$refs.next,
        prevEl: this.$refs.prev,
      },
      modules: [
        Navigation
      ]
    })
  },
  beforeUnmount() {
    this.swiper.destroy()
  },
  data() {
    return {
      swiper: null
    }
  },
  computed: {
    technologies() {
      const result = []

      for (let i = 0; i < 4; i++) {
        result.push(...TECHNOLOGIES)
      }

      return result
    }
  }
})
</script>

<style scoped lang="scss">
.technologies-container {
  background-image: url(./../../assets/images/technologies_bg.png);
  background-position: bottom;
  background-size: 100% auto;
  background-repeat: no-repeat;

  .box-technologies {
    display: flex;
    flex-direction: column;
    gap: 50px;

    .technology-card {
      flex: 0 0 50%;
      width: 50%;
    }
  }

  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-wrapper {
    position: relative;
    width: 100%;
    height: 100%;
    z-index: 1;
    display: flex;
  }

  .swiper-container {
    position: relative;
  }

  .swiper-button-next, .swiper-button-prev {
    z-index: 100;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #006DB1;
  }

  .swiper-button-next {
    right: -100px;
  }

  .swiper-button-prev {
    left: -100px;
  }
}
</style>