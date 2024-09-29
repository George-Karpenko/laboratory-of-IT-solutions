<template>
  <div
    v-if="slideStore.slides.length > 0"
    class="box-intro"
    :style="`background-image: url(${slideStore.slide.photo})`"
    :key="slideStore.slideIndex"
  >
    <Header theme="white" :is-fixed="true" />

    <div class="content-container">
      <div class="arrow-left">
        <button type="button" @click="slideStore.prevSlide">
          <Icon name="arrow-left" />
        </button>
      </div>

      <div class="content content-width">
        <div class="title-1">{{ slideStore.slide.title }}</div>
        <div class="title-2" v-html="slideStore.slide.subTitle"></div>

        <div
          class="d-flex align-items-center justify-content-center justify-content-lg-start gap-10 mt-48 mt-lg-0"
        >
          <div class="arrow-left-mobile d-flex d-lg-none">
            <button type="button" @click="slideStore.prevSlide">
              <Icon name="arrow-left" />
            </button>
          </div>

          <NuxtLink :to="slideStore.slide.url" class="btn-detail"
            >подробнее »</NuxtLink
          >

          <div class="arrow-right-mobile d-flex d-lg-none">
            <button type="button" @click="slideStore.nextSlide">
              <Icon name="arrow-right" />
            </button>
          </div>
        </div>
      </div>

      <div class="arrow-right">
        <button type="button" @click="slideStore.nextSlide">
          <Icon name="arrow-right" />
        </button>
      </div>
    </div>

    <AdvantagesSlider />
  </div>

  <ServicesBlock :enabled-slider="true">
    <template #title>
      <h2>Услуги</h2>
    </template>

    <template #description>
      Предлагаем ваш широкий спектр услуг в сфере строительства, в том числе в
      условиях крайнего севера
    </template>
  </ServicesBlock>

  <TechnologiesSlider2 v-if="innerWidth <= 992" />

  <div v-else class="box-technologies">
    <div class="content-width mx-auto box-title">
      <h2>Технологии</h2>

      <span
        >В своей работе мы используем только лучшее и современное
        оборудование</span
      >
    </div>

    <div class="content-width mx-auto technologies">
      <div class="col-1">
        <TechnologyCard :technology="technologies[0]" />

        <div class="description">
          <Icon name="computer" />

          <div>
            <span
              >В своей работе мы используем только современное оборудование. В
              своей работе мы используем только лучшее оборудование. В своей
              работе мы используем только современное оборудование.
            </span>

            <ButtonDetail />
          </div>
        </div>
      </div>

      <div class="col-2">
        <TechnologyCard :technology="technologies[1]" />

        <TechnologyCard :technology="technologies[2]" />
      </div>
    </div>
  </div>

  <ProjectsSlider />

  <div class="box-about">
    <div class="content-width mx-auto box-title">
      <h2>О компании</h2>

      <span>Работаем для вас уже более 10 лет</span>
    </div>

    <div class="box-description">
      <div class="description">
        <p>
          Небольшое описание компании в несколько строчек текста. Описание
          компании в несколько строчек текста. Небольшое описание компании в
          несколько строчек текста. Небольшое описание компании в несколько
          строчек текста.
        </p>

        <p>
          Небольшое описание компании в несколько строчек текста. Описание
          компании в несколько строчек текста.
        </p>

        <p>
          Небольшое описание компании в несколько строчек текста. Небольшое
          описание компании в несколько строчек текста. О компании в несколько
          строчек текста. Небольшое описание компании в несколько строчек
          текста.
        </p>
      </div>

      <ButtonDetail />
    </div>

    <img src="~/assets/images/goals_1.png" class="bg" alt="" />
  </div>
</template>

<script>
import { defineComponent } from "vue";
import ButtonDetail from "~/components/buttons/button-detail/ButtonDetail.vue";
import { TECHNOLOGIES } from "~/helpers/constants.js";
import TechnologiesSlider2 from "~/components/technologies-slider-2/TechnologiesSlider2.vue";

export default defineComponent({
  name: "index",
  components: {
    TechnologiesSlider2,
    ButtonDetail,
  },
  created() {
    this.slideStore.saveSlides();
  },
  methods: {
    async updateHeader() {},
  },
  computed: {
    technologies() {
      return TECHNOLOGIES;
    },
    innerWidth() {
      return useMainStore().innerWidth;
    },
    slideStore() {
      return useSlideStore();
    },
  },
});
</script>

<style scoped lang="scss">
.box-intro {
  background-image: url(./../assets/images/index_bg.png);
  background-repeat: no-repeat;
  padding-bottom: 70px;

  .content-container {
    display: flex;
    align-items: center;
    gap: 154px;
    padding: 0 150px;
    margin: 0 auto;

    .arrow-left button,
    .arrow-right button {
      cursor: pointer;
      width: 60px;
      height: 60px;
      padding: 0;
      background-color: #ffffff26;
      display: flex;
      justify-content: center;
      align-items: center;
      border: none;
      color: #fff;
    }

    .content {
      margin-top: 50px;

      .title-1 {
        color: #fff;
        font-size: 210px;
        line-height: 246.09px;
        font-weight: 700;
        font-family: "Roboto Condensed";
        text-transform: uppercase;
      }

      .title-2 {
        margin-top: -23px;
        color: #fff;
        font-size: 88px;
        line-height: 96px;
        font-family: "Roboto Condensed";
        text-transform: uppercase;
      }

      .btn-detail {
        margin-top: 30px;
        width: 185px;
        height: 60px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: transparent;
        border: 2px solid #fff;
        color: #fff;
        font-size: 18px;
        text-transform: uppercase;
        font-family: "Roboto Condensed";
      }
    }
  }
}

.box-services {
  margin-top: 110px;
}

.box-technologies {
  margin-top: 110px;
  margin-bottom: 110px;
  background-image: url(./../assets/images/technologies_bg.png),
    url(./../assets/images/technologies_bg_2.png);
  background-repeat: no-repeat;
  background-position: 100% calc(100% - 110px), bottom;
  padding-bottom: 110px;
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

  .technologies {
    display: flex;
    gap: 20px;

    .col-1 {
      flex: 0 0 57.5%;
      display: flex;
      flex-direction: column;
      gap: 60px;

      .description {
        display: flex;
        align-items: flex-start;
        gap: 35px;
        padding-right: 39px;

        & > svg {
          color: #006db1;
          min-width: 59px;
        }

        & > span {
          color: #484848;
          font-size: 16px;
          line-height: 24px;
        }

        & > div:nth-child(2) {
          display: flex;
          flex-direction: column;
          gap: 20px;
        }
      }
    }

    .col-2 {
      flex: 1 1 auto;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
  }
}

.box-about {
  position: relative;
  margin-top: 110px;
  padding-top: 104px;
  padding-bottom: 110px;
  background-color: #f6f8f9;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  gap: 60px;

  .box-title {
    display: flex;
    align-items: center;
    gap: 50px;

    span {
      font-size: 18px;
      line-height: 26px;
      color: #000000;
    }
  }

  .box-description {
    position: relative;
    background-color: #ffffff;
    padding: 50px 50px 43px 50px;
    width: min(778px, 100%);
    margin-right: 364px;
    display: flex;
    flex-direction: column;
    gap: 30px;
    z-index: 1;

    .description {
      color: #484848;
      font-size: 16px;
      line-height: 24px;
    }
  }

  .bg {
    position: absolute;
    left: 210px;
    bottom: 86px;
    width: 661px;
    height: auto;
  }
}

@media (max-width: 1500px) {
  .box-intro {
    .content-container {
      padding: 0 20px;
      gap: 0;
      justify-content: space-between;

      .content {
        width: fit-content;
      }
    }
  }
}

@media (max-width: 1280px) {
  .box-intro {
    .content-container {
      padding: 0 20px;
      gap: 0;
      justify-content: space-between;

      .content {
        width: fit-content;
      }
    }
  }

  .box-about {
    .bg {
      left: initial;
      right: 0;
    }
  }
}

@media (max-width: 1100px) {
  .box-intro {
    background-size: cover;

    .content-container {
      .content {
        .title-1 {
          font-size: 180px;
          line-height: normal;
        }

        .title-2 {
          font-size: 70px;
          line-height: normal;
        }
      }
    }
  }

  .box-about {
    .box-description {
      margin-left: auto;
      margin-right: auto;
    }
  }
}

@media (max-width: 992px) {
  .box-intro {
    .content-container {
      .arrow-left button,
      .arrow-right button {
        display: none;
      }

      .arrow-left-mobile button,
      .arrow-right-mobile button {
        cursor: pointer;
        width: 50px;
        height: 50px;
        padding: 0;
        background-color: #ffffff26;
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        color: #fff;
      }

      .content {
        .title-1 {
          font-size: 120px;
        }

        .title-2 {
          font-size: 50px;
        }

        .btn-detail {
          margin-top: 0;
          height: 50px;
        }
      }
    }
  }
}

@media (max-width: 576px) {
  .box-intro {
    background-size: cover;
    padding-bottom: 46px;

    .content-container {
      flex-wrap: wrap;
      padding: 0 20px;
      gap: 10px;
      align-items: flex-end;

      .content {
        order: 0;
        padding: 0;

        .title-1 {
          font-size: 60px;
          line-height: 70.31px;
          text-align: center;
        }

        .title-2 {
          margin-top: 0;
          font-size: 24px;
          line-height: 30px;
          text-align: center;
        }
      }
    }
  }

  .box-technologies {
    margin-top: 50px;
    gap: 25px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .technologies {
      flex-direction: column;
    }

    .col-1 {
      flex: 0 0 auto !important;
    }

    .col-2 {
      flex: 0 0 auto !important;
    }
  }

  .box-about {
    padding-top: 50px;
    margin-top: 50px;
    padding-bottom: 50px;
    gap: 25px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .box-description {
      margin-right: 0;
      background-color: transparent;
      padding: 0 20px;
    }

    .bg {
      position: relative;
      width: 100%;
      height: auto;
      inset: initial;
    }
  }
}
</style>
