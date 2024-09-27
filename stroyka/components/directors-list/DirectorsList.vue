<template>
  <div class="swiper-container">
    <div ref="swiper" class="swiper">
      <div ref="swiper-wrapper" class="directors-list swiper-wrapper">
        <div v-for="item in directors" class="item swiper-slide">
          <div class="box-image"></div>
          <div class="name">{{ item }}</div>
        </div>
      </div>

      <div ref="swiper-pagination" class="swiper-pagination"></div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Pagination} from "swiper/modules";

export default defineComponent({
  name: "DirectorsList",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: this.$refs["swiper-pagination"]
      },
      modules: [
        Pagination
      ],
      breakpoints: {
        576: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        1280: {
          slidesPerView: 4
        }
      },
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
    directors() {
      return [
        'Иванов Иван Иванович',
        'Петрова Елена Константиновна',
        'Семенов Виктор Олегович',
        'Пономаренко Александр Васильевич',
      ]
    },
  }
})
</script>

<style scoped lang="scss">
.directors-list {
  display: flex;

  .item {
    background-color: #FFF;
    width: 283px;
    display: flex;
    flex-direction: column;
    gap: 17px;

    .box-image {
      width: 100%;
      height: 309px;
      border: 1px solid #E0E8EC;
    }

    .name {
      font-size: 24px;
      line-height: 30px;
      font-family: "Roboto Condensed";
      color: #171717;
      text-align: center;
    }
  }
}

.swiper-pagination {
  position: relative !important;
  margin-top: 20px !important;
  inset: initial !important;
}

@media (max-width: 576px) {
  .directors-list {
    .item {
      width: 100%;

      .box-image {
        height: 284px;
      }
    }
  }
}
</style>