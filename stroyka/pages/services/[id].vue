<template>
  <div class="box-intro">
    <div class="content-width mx-auto">
      <Breadcrumbs :items="breadcrumbs" class="white" />

      <h1 class="white without-icon">Строительство</h1>

      <p class="text-white w-100 w-xl-50 mt-30">Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию.</p>

      <p class="text-white w-100 w-xl-50 mt-24">Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию.</p>

      <div class="d-flex flex-column flex-xl-row align-items-center gap-15 mt-50">
        <ButtonOutline class="w-100 w-xl-auto" @click="mainStore.openFeedbackModal">Оставить заявку</ButtonOutline>
        <ButtonOutline class="w-100 w-xl-auto">Рассчитать стоимость</ButtonOutline>
      </div>
    </div>
  </div>

  <div class="content-width mx-auto box-number-advantages">
    <div v-for="item in numberAdvantages" class="number-advantage">
      <span class="number">{{ item.toLocaleString('ru-ru') }}</span>
      <div class="line"></div>
      <span class="name">числовой показатель <br> какого-то преимущества</span>
    </div>
  </div>

  <div
      v-for="(advantage, index) in advantages"
      class="box-detail-advantage"
      :class="{'reverse': index % 2 !== 0}"
  >
    <div class="box-image">
      <img :src="advantage.image" alt="">

      <div class="box-icon">
        <Icon :name="advantage.icon" />
      </div>
    </div>

    <div class="box-content">
      <h4>{{ advantage.title }}</h4>

      <span v-html="advantage.description"></span>
    </div>
  </div>

  <div class="box-calculator">
    <div class="content-width mx-auto">
      <h2 class="white without-icon">Рассчитайте стоимость</h2>

      <div class="w-100 text-white mt-85 text-center">ТУТ БУДЕТ ОПРОС</div>
    </div>
  </div>

  <ProjectsSlider />

  <FeedbackSlider />

  <ProductsSlider />

  <PartnersSlider />
</template>

<script>
import {defineComponent} from 'vue'
import FeedbackSlider from "~/components/feedback-slider/FeedbackSlider.vue";
import ProductsSlider from "~/components/products-slider/ProductsSlider.vue";

export default defineComponent({
  name: "[id]",
  components: {ProductsSlider, FeedbackSlider},
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Услуги', to: '/services'},
        {name: 'Строительство'},
      ]
    },
    numberAdvantages() {
      return [1504, 145, 10000, 943, 487]
    },
    advantages() {
      return [
        {
          title: 'Работаем в условиях крайнего севера',
          description: `
          <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек.</p>

          <p>Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст <u class="text-primary">об услуге</u> и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге.</p>
          `,
          image: '/images/service_advantage_1.png',
          icon: 'sever-2'
        },
        {
          title: 'Профессиональная команда строителей с многолетним стажем',
          description: `
          <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек.</p>
          <p>Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст.</p>
          `,
          image: '/images/service_advantage_2.png',
          icon: 'workers'
        },
        {
          title: 'Строительство объектов по всей стране',
          description: `
          <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек.</p>
          <p>Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст <u class="text-primary">об услуге</u> и почему вам стоит обратиться именно в нашу компанию. Небольшое описание услуги в несколько строчек. Интересный текст об услуге.</p>
          `,
          image: '/images/service_advantage_3.png',
          icon: 'map'
        }
      ]
    },
    mainStore() {
      return useMainStore()
    }
  }
})
</script>

<style scoped lang="scss">
.box-intro {
  padding: 1px 0 112px 0;
  background: linear-gradient(90deg, rgba(0, 109, 177, 0.85) 44.32%, rgba(0, 109, 177, 0) 82.86%), url(~/assets/images/service_bg.png);

  p {
    margin: 0;
  }
}

.box-number-advantages {
  margin-top: 110px;
  display: flex;
  justify-content: space-between;
  align-items: center;

  .number-advantage {
    display: flex;
    flex-direction: column;
    gap: 15px;

    .number {
      color: #006DB1;
      font-size: 60px;
      line-height: 60px;
      font-weight: 700;
      font-family: "Roboto Condensed";
    }

    .line {
      width: 34px;
      height: 2px;
      background-color: #FFA800;
    }

    .name {
      color: #484848;
      font-size: 14px;
      line-height: 20px;
    }
  }
}

.box-detail-advantage {
  margin-top: 110px;
  display: flex;
  align-items: center;
  gap: 80px;

  &.reverse {
    flex-direction: row-reverse;

    .box-image {
      .box-icon {
        left: initial;
        right: 0;
        justify-content: flex-end;
      }
    }
  }

  .box-image {
    position: relative;
    flex: 0 0 849px;
    height: 430px;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .box-icon {
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      background-color: #006DB1;
      width: 155px;
      height: 230px;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      color: #FFF;
    }
  }

  .box-content {
    flex: 0 0 627px;

    p {
      color: #484848;
    }
  }
}

.box-calculator {
  padding: 1px 0;
  height: 614px;
  margin-top: 110px;
  background-color: #006DB1;

  h2 {
    margin-top: 104px;
  }
}

.box-projects-slider {
  margin-top: 110px;
}

.box-feedback-slider {
  margin-top: 110px;
}

.box-products-slider {
  margin-top: 110px;
}

.box-partners-slider {
  margin-top: 110px;
  margin-bottom: 110px;
}

@media (max-width: 1600px) {
  .box-detail-advantage .box-image {
    flex: 1 1 auto;
  }
}

@media (max-width: 768px) {
  .box-intro {
    background: linear-gradient(to bottom, rgba(0, 109, 177, 0.85), rgba(0, 109, 177, 0.85)), url(~/assets/images/service_bg.png);
    background-size: cover;
    padding: 1px 0 50px 0;
  }

  .box-number-advantages {
    margin-top: 50px;
    overflow-x: auto;
    gap: 20px;

    .number-advantage {
      position: relative;
      min-width: 260px;
      width: 260px;
      flex-direction: row;
      align-items: center;

      .number {
        font-size: 26px;
        line-height: normal;
      }

      .name {
        font-size: 14px;
        line-height: 20px;
      }

      .line {
        position: absolute;
        left: 0;
        bottom: 0;
      }
    }
  }

  .box-detail-advantage {
    margin-top: 50px;
    flex-direction: column;
    gap: 25px;

    &.reverse {
      flex-direction: column;
    }

    .box-image {
      flex: 0 0 100%;
      height: 162px;

      .box-icon {
        width: 57px;
        height: 86px;

        svg {
          width: 40px;
          height: 40px;
        }
      }
    }

    .box-content {
      flex: 0 0 auto;
      padding: 0 20px;

      h4 {
        margin-top: 0;
      }

      p {
        font-size: 14px;
      }
    }
  }

  .box-calculator {
    margin-top: 50px;
    height: 419px;
  }

  .box-projects-slider {
    margin-top: 50px;
  }

  .box-feedback-slider {
    margin-top: 50px;
  }

  .box-products-slider {
    margin-top: 50px;
  }

  .box-partners-slider {
    margin-top: 50px;
    margin-bottom: 50px;
  }
}
</style>