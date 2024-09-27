<template>
  <div class="box-intro">
    <div class="content-width mx-auto">
      <Breadcrumbs :items="breadcrumbs" class="white" />

      <h1 class="white without-icon">спортивный комплекс <br> «победа»</h1>

      <p class="text-white mt-30">Небольшое описание объекта в несколько строчек. Интересный текст об объекте, о том, как мы его строили и с какими трудностями столкнулись и успешно их решили. Небольшое описание объекта в несколько строчек. Интересный текст об объекте, о том, как мы его строили и с какими трудностями столкнулись и успешно их решили.</p>

      <p class="text-white mt-24">Небольшое описание объекта в несколько строчек. Интересный текст об объекте.</p>
    </div>
  </div>

  <div class="box-project-info">
    <div class="slider">
      <ProjectImagesSlider />
    </div>

    <div class="project-info">
      <h4>Сочетание современности и ФУНКЦИОНАЛЬНОсти</h4>

      <p>Небольшое описание проекта в несколько строчек. Интересный текст о проекте. Небольшое описание проекта в несколько строчек. Интересный текст о проекте и его ключевых особенностях. Небольшое описание проекта в несколько строчек.Небольшое описание проекта в несколько строчек. Интересный текст о проекте.</p>

      <p>Интересный текст о проекте и его ключевых особенностях. Небольшое описание проекта в несколько строчек.и его ключевых особенностях. Интересный текст о проекте и его ключевых особенностях. Небольшое описание проекта в несколько строчек.и его ключевых особенностях. Небольшое описание проекта в несколько строчек.и его ключевых особенностях.</p>

      <div class="location">
        <Icon name="geo" />
        <span>Норильск, Россия</span>
      </div>
    </div>
  </div>

  <div class="box-map">
    <img src="~/assets/images/map_3.png" alt="">
  </div>

  <div class="content-width mx-auto mt-50 mt-sm-110">
    <div class="d-flex flex-column flex-sm-row gap-20">
      <div class="flex-50 text-gray">
        <p>Небольшое описание проекта в несколько строчек.Небольшоеописание проекта в несколько строчек. Интересный текст о проекте Небольшое описание проекта в несколько строчек.  Интересный текст о проекте и его ключевых особенностях. Небольшое описание проекта в несколько строчек.и его ключевых особенностях.</p>

        <p>Небольшое описание проекта в несколько строчек.  Небольшое описание проекта в несколько строчек.</p>
      </div>

      <div class="flex-50 text-gray">
        <p>Небольшое описание проекта в несколько строчек.Небольшоеописание проекта в несколько строчек. Интересный текст о проекте Небольшое описание проекта в несколько строчек.</p>

        <p>Интересный текст о проекте и его ключевых особенностях. Небольшое описание проекта в несколько строчек.и его ключевых особенностях. Небольшое описание проекта в несколько строчек.</p>
      </div>
    </div>
  </div>

  <ServicesBlock :enabled-slider="true" class="mt-50 mt-sm-110">
    <template #title>
      <h3 class="with-icon">Услуги, включенные в проект</h3>
    </template>
  </ServicesBlock>

  <TechnologiesSlider2 v-if="innerWidth <= 576" :hide-description="true" class="mb-0" />
  <TechnologiesSlider v-else />
</template>

<script>
import {defineComponent} from 'vue'
import {SERVICES} from "~/helpers/constants.js";
import TechnologiesSlider from "~/components/technologies-slider/TechnologiesSlider.vue";

export default defineComponent({
  name: "[id]",
  components: {TechnologiesSlider},
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Проекты', to: '/projects'},
        {name: 'Спортивный комплекс «Победа»'},
      ]
    },
    services() {
      return SERVICES
    },
    innerWidth() {
      return useMainStore().innerWidth
    }
  }
})
</script>

<style scoped lang="scss">
.box-intro {
  padding: 1px 0 156px 0;
  background-image: linear-gradient(90deg, rgba(0, 109, 177, 0.85) 44.32%, rgba(0, 109, 177, 0) 82.86%), url(~/assets/images/project_bg.png);
  background-position: 0 10%;

  p {
    width: min(788px, 100%);
    margin: 0;
  }
}

.box-project-info {
  display: flex;
  align-items: center;
  gap: 90px;

  .slider {
    width: 949px;
    height: 665px;
    flex: 0 0 949px;
  }

  .project-info {
    h4 {
      width: min(515px, 100%);
    }

    p {
      width: min(515px, 100%);
      color: #484848;
    }

    .location {
      margin-top: 25px;
      display: flex;
      align-items: center;
      gap: 8px;
      color: #006DB1;
      font-size: 14px;
      line-height: 20px;
    }
  }
}

.box-map {
  width: 100%;
  height: 352px;

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
}

.technologies-container {
  margin-top: 110px;
  padding-bottom: 110px;
}

@media (max-width: 1500px) {
  .box-project-info {
    gap: 20px;
    padding-right: 10px;

    .slider {
      flex: 0 0 50%;
      width: 50%;
    }
  }
}

@media (max-width: 992px) {
  .box-project-info {
    flex-direction: column;

    .slider {
      height: 500px;
      flex: 0 0 auto;
      width: 100%;
    }

    .project-info {
      h4 {
        padding: 0 20px;
      }

      p {
        padding: 0 20px;
        width: 100%;
      }

      .location {
        margin-bottom: 20px;
      }
    }
  }
}

@media (max-width: 576px) {
  .box-intro {
    padding: 1px 0 50px 0;
    background-image: linear-gradient(to bottom, rgba(0, 109, 177, 0.85), rgba(0, 109, 177, 0.85)), url(~/assets/images/project_bg.png);
    background-size: cover;

    p {
      font-size: 14px;
      line-height: 20px;
    }
  }

  .box-project-info {
    flex-direction: column-reverse;
    gap: 40px;

    .project-info {
      padding: 0 20px;
    }

    .slider {
      flex: 0 0 auto;
      width: 100%;
      height: 224px;
    }

    p {
      font-size: 16px;
      line-height: 20px;
    }
  }
}
</style>