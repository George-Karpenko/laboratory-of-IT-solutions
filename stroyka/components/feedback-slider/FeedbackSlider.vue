<template>
  <div class="content-width mx-auto box-feedback-slider">
    <div class="box-title">
      <h2>Отзывы</h2>

      <span>Нашими клиентами стали уже более 100 компаний</span>
    </div>

    <div class="swiper-container">
      <div ref="swiper" class="swiper">
        <div ref="swiper-wrapper" class="swiper-wrapper">
          <div v-for="item in items" class="feedback-item swiper-slide">
            <div class="box-image">скан</div>
            <div class="name">{{ item }}</div>
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
  name: "FeedbackSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 2.1,
      spaceBetween: 20,
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
          slidesPerView: 5
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
    items() {
      const items = [
        'ООО «Строим вместе»',
        'ООО «Школа искусств Легион»',
        'ООО «Родина»',
        'ООО «СтройСервис Индастри»',
        'ООО «Братья Соловьевы»'
      ]

      const result = []

      for (let i = 0; i < 3; i++) {
        result.push(...items)
      }

      return result
    }
  }
})
</script>

<style scoped lang="scss">
.box-feedback-slider {
  display: flex;
  flex-direction: column;
  gap: 60px;

  .box-title {
    display: flex;
    align-items: center;
    gap: 50px;

    span {
      color: #484848;
      font-size: 18px;
      line-height: 26px;
    }
  }

  .feedback-item {
    width: 222px;

    display: flex;
    flex-direction: column;
    gap: 20px;

    .box-image {
      width: 100%;
      height: 314px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid #E0E8EC;
    }

    .name {
      color: #171717;
      font-size: 16px;
      line-height: 24px;
      text-align: center;
    }
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

  .swiper-pagination {
    display: none;
    position: relative !important;
    margin-top: 20px !important;
    inset: initial !important;
  }
}

@media (max-width: 576px) {
  .box-feedback-slider {
    gap: 25px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .feedback-item {
      .box-image {
        height: 170px;
      }
    }

    .swiper-pagination {
      display: block;
    }
  }
}
</style>