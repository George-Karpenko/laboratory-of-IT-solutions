<template>
  <div class="content-width mx-auto box-partners-slider">
    <h2>Партнеры</h2>

    <div class="swiper-container">
      <div ref="swiper" class="swiper">
        <div ref="swiper-wrapper" class="swiper-wrapper">
          <div v-for="partner in partners" class="partner swiper-slide">
            <img :src="`/images/${partner}`" alt="">
          </div>
        </div>
      </div>

      <div ref="prev" class="swiper-button-prev" role="button" tabindex="0">
        <Icon name="arrow-left" />
      </div>

      <div ref="next" class="swiper-button-next" role="button" tabindex="0">
        <Icon name="arrow-right" />
      </div>

      <div ref="swiper-pagination" class="swiper-pagination"></div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Navigation, Pagination} from "swiper/modules";

export default defineComponent({
  name: "PartnersSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 2.2,
      spaceBetween: 30,
      navigation: {
        nextEl: this.$refs.next,
        prevEl: this.$refs.prev,
      },
      pagination: {
        el: this.$refs["swiper-pagination"]
      },
      modules: [
        Navigation,
        Pagination
      ],
      breakpoints: {
        576: {
          slidesPerView: 7,
          spaceBetween: 70
        }
      }
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
    partners() {
      const partners = [
          'partner_1.svg',
          'partner_2.svg',
          'partner_3.svg',
          'partner_4.svg',
          'partner_5.svg',
          'partner_6.svg',
          'partner_7.svg',
      ]

      const result = []

      for (let i = 0; i < 3; i++) {
        result.push(...partners)
      }

      return result
    }
  }
})
</script>

<style scoped lang="scss">
.box-partners-slider {
  display: flex;
  flex-direction: column;
  gap: 60px;

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

  .swiper-pagination {
    display: none;
    position: relative !important;
    margin-top: 20px !important;
    inset: initial !important;
  }
}

@media (max-width: 576px) {
  .box-partners-slider {
    gap: 25px;

    .swiper-pagination {
      display: block;
    }
  }
}
</style>