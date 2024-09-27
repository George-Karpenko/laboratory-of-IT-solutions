<template>
  <div class="content-width mx-auto box-projects-slider">
    <div class="box-title">
      <h2>Проекты</h2>

      <Tabs :tabs="tabs" :active-tab="tab" @change="(value) => tab = value" />
    </div>

    <div class="swiper-container">
      <div ref="swiper" class="swiper">
        <div ref="swiper-wrapper" class="swiper-wrapper">
          <ProjectCard
              v-for="project in projects"
              :project="project"
              :hide-description="true"
              class="swiper-slide"
          />
        </div>
      </div>

      <div ref="swiper-pagination" class="swiper-pagination"></div>

      <div ref="prev" class="swiper-button-prev" role="button" tabindex="0">
        <Icon name="arrow-left" />
      </div>

      <div ref="next" class="swiper-button-next" role="button" tabindex="0">
        <Icon name="arrow-right" />
      </div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

import Swiper from "swiper";
import 'swiper/css';
import 'swiper/css/pagination';
import {Navigation, Pagination} from "swiper/modules";

import {PROJECTS} from "~/helpers/constants.js";


export default defineComponent({
  name: "ProjectsSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 1,
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
        577: {
          slidesPerView: 3
        }
      }
    })
  },
  beforeUnmount() {
    this.swiper.destroy()
  },
  data() {
    return {
      tab: 'all',
      swiper: null,
    }
  },
  computed: {
    tabs() {
      return [
        { name: 'Все', slug: 'all' },
        { name: 'Образовательные учреждения', slug: 'institutions' },
        { name: 'Офисы', slug: 'offices' },
        { name: 'Ангары', slug: 'hangars' },
      ]
    },
    projects() {
      const result = []

      for (let i = 0; i < 3; i++) {
        result.push(...PROJECTS)
      }

      return result
    },
  }
})
</script>

<style scoped lang="scss">
.box-projects-slider {
  display: flex;
  flex-direction: column;
  gap: 60px;

  .box-title {
    display: flex;
    align-items: center;
    gap: 50px;
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
  }
}

@media (max-width: 576px) {
  .box-projects-slider {
    gap: 20px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
    }

    .swiper-button-next, .swiper-button-prev {
      display: none;
    }

    .swiper-pagination {
      position: relative !important;
      margin-top: 20px !important;
      inset: initial !important;
    }
  }
}
</style>