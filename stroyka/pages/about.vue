<template>
  <div class="box-about">
    <div class="box-description">
      <div class="box-image">
        <img src="~/assets/images/about_1.png" alt="">
      </div>

      <div class="description">
        <p>Несколько хороших слов о компании. Небольшое описание компании.</p>

        <p>Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста. </p>

        <p>Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста.Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста.Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста.</p>

        <p>Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста. Несколько хороших слов о компании. Небольшое описание компании в несколько строчек текста.</p>
      </div>
    </div>

    <Breadcrumbs :items="breadcrumbs" />

    <h1>О компании</h1>

    <div class="box-timeline">
      <div v-for="year in years" class="timeline-item">
        <div class="year">
          <span>{{ year.year }}</span>
          <div class="line"></div>
        </div>
        <div class="text">{{ year.text }}</div>
      </div>
    </div>
  </div>

  <div class="box-goals">
    <div class="box-title">
      <h2>Наши цели</h2>

      <span>Предлагаем ваш широкий спектр услуг в сфере строительства, в том <br> числе в условиях крайнего севера</span>
    </div>

    <div class="content">
      <p>Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста.Небольшое описание компании в несколько строчек текста.</p>

      <p>Небольшое описание компании в несколько строчек текста.Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста.Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста.</p>

      <img src="~/assets/images/goals_1.png" alt="" class="d-block d-sm-none w-100">
    </div>
  </div>

  <Offices />
</template>

<script >
import {defineComponent} from 'vue'

export default defineComponent({
  name: "about",
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'О нас'},
        {name: 'О компании'},
      ]
    },
    years() {
      return [
        { year: 2021, text: 'Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год.' },
        { year: 2020, text: 'Информация о том, что у нас произошло в этом году. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год.' },
        { year: 2019, text: 'Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. ' },
        { year: 2018, text: 'Информация о том, что у нас произошло в этом году. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год. Краткая информация о ключевых моментах компании, которые произошли за год.' },
        { year: 2017, text: 'Информация о том, что у нас произошло в этом году. Краткая информация о ключевых моментах компании, которые произошли за год.' },
      ]
    }
  }
})
</script>

<style scoped lang="scss">
.box-about {
  display: grid;
  grid-template-columns: 748px 1fr;
  grid-template-rows: auto auto 1fr;
  gap: 0 120px;
  background-color: #F6F8F9;

  .box-description {
    grid-column-start: 1;
    grid-row-start: 1;
    grid-row-end: span 3;

    .box-image {
      width: 100%;
      height: 472px;

      img {
        width: 100%;
        height: 100%;
        object-fit: cover;
      }
    }

    .description {
      background-color: #006DB1;
      padding: 80px 50px 90px;
      background-image: url(../assets/images/about_logo.svg);
      background-repeat: no-repeat;
      background-position: left bottom;

      p {
        width: 334px;
        color: #FFFFFF;
        font-size: 16px;
        margin: 0 0 25px auto;
        line-height: 24px;

        &:last-child {
          margin: 0 0 0 auto;
        }
      }
    }
  }

  .breadcrumbs {
    grid-column-start: 2;
    grid-row-start: 1;
  }

  h1 {
    grid-column-start: 2;
    grid-row-start: 2;
  }

  .box-timeline {
    grid-column-start: 2;
    grid-row-start: 3;
    margin-top: 60px;
    display: flex;
    flex-direction: column;
    gap: 40px;
    padding-right: 364px;

    .timeline-item {
      display: flex;
      gap: 38px;

      .year {
        position: relative;
        font-family: "Roboto Condensed";
        font-weight: 700;
        color: #006DB1;
        line-height: 40px;
        height: fit-content;
        font-size: 25px;

        .line {
          position: absolute;
          left: 0;
          bottom: -2px;
          width: 25px;
          height: 2px;
          background-color: #FFA800;
        }
      }

      .text {
        color: #484848;
        font-size: 16px;
        line-height: 24px;
      }
    }
  }
}

.box-goals {
  margin-top: 110px;
  margin-left: 364px;
  margin-right: 207px;
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

  .content {
    height: 398px;
    background-image: url(./../assets/images/goals_1.png);
    background-position: right bottom;
    background-repeat: no-repeat;
    background-size: auto 100%;

    p {
      width: 777px;
      color: #484848;
      font-size: 16px;
      line-height: 24px;
      margin: 0;

      &:not(:last-child) {
        margin: 0 0 25px 0;
      }
    }
  }
}

.box-map {
  margin-top: 0;
}

@media (max-width: 1800px) {
  .box-about {
    gap: 0 40px;

    .box-timeline {
      padding-right: 20px;
    }
  }

  .box-goals {
    width: min(1192px, 100%);
    padding: 0 20px;
    margin-left: auto;
    margin-right: auto;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }
  }
}

@media (max-width: 1400px) {
  .box-about {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 1200px) {
  .box-about {
    grid-template-columns: 450px 1fr;

    .box-description {
      .description {
        p {
          margin: 0 0 25px 0;

          &:last-child {
            margin: 0;
          }
        }
      }
    }

    .box-timeline {
      gap: 20px;
    }
  }
}

@media (max-width: 992px) {
  .box-about {
    grid-template-columns: 100%;
    grid-template-rows: auto;
    gap: 25px;

    .box-description {
      grid-row-start: 3;
      grid-row-end: 3;

      .box-image {
        height: 202px;
      }

      .description {
        padding: 40px 20px;

        p {
          width: auto;
          margin: 0 0 25px 0;

          &:last-child {
            margin: 0;
          }
        }
      }
    }

    .breadcrumbs {
      grid-column-start: 1;
      grid-row-start: 1;
      padding: 0 20px;
    }

    h1 {
      margin-top: 0;
      grid-column-start: 1;
      grid-row-start: 2;
      padding: 0 20px;
    }

    .box-timeline {
      grid-column-start: 1;
      grid-row-start: 4;
      padding: 0 20px;
    }
  }

  .box-goals {
    padding: 0 20px;
    margin: 50px 0 0 0;
    gap: 25px;

    .box-title {
      align-items: flex-start;
      flex-direction: column;
      gap: 6px;
    }

    .content {
      height: auto;
      background-image: none;

      p {
        width: auto;
      }
    }
  }

  .box-map {
    margin-top: 50px;
  }
}
</style>