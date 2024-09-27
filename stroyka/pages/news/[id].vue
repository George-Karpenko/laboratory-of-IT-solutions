<template>
  <div class="content-width mx-auto news-show-page">
    <Breadcrumbs :items="breadcrumbs" />

    <h1>Торговый центр в Московской области</h1>

    <div class="content">
      <div class="col-1">
        <div class="d-flex flex-column flex-xl-row gap-30 gap-xl-70">
          <img src="~/assets/images/news_4.png" width="485" height="400" alt="" />

          <div>
            <p><b>Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. </b></p>

            <p>Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек.</p>
          </div>
        </div>

        <p class="mt-20 mt-xl-56">Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. </p>

        <p>Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. </p>

        <h3>Дополнительная информация</h3>

        <p>Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. </p>

        <p>Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст новости в несколько строчек. Интересный текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. </p>
      </div>

      <div class="col-2">
        <div class="box-date">
          <div class="date">
            <Icon name="calendar" />
            <span>1 сентября 2021</span>
          </div>

          <div class="category">Наши объекты</div>

          <NuxtLink to="/news" class="back-link">
            <Icon name="double-arrow-left" />
            <span>Вернуться к новостям</span>
          </NuxtLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "[id]",
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Новости', to: '/news'},
        {name: 'Торговый центр в Московской области'},
      ]
    }
  }
})
</script>

<style scoped lang="scss">
.news-show-page {
  h1 {
    padding-right: 282px;
  }

  & > .content {
    margin-top: 60px;
    margin-bottom: 110px;
    display: flex;
    gap: 90px;

    .col-1 {
      flex: 1 1 auto;

      img {
        object-fit: cover;
      }

      p {
        margin-top: 0;
        color: #484848;
        font-size: 16px;
        line-height: 24px;
      }

      h3 {
        margin-top: 70px;
        margin-bottom: 30px;
      }
    }

    .col-2 {
      flex: 0 0 282px;

      .box-date {
        padding-left: 37px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        border-left: 1px solid #E0E8EC;

        .date {
          color: #484848;
          font-size: 16px;
          line-height: 24px;
          display: flex;
          align-items: center;
          gap: 14px;
        }

        .category {
          width: fit-content;
          background-color: #F6F8F9;
          padding: 5px 15px;
          color: #5F5F5F;
          font-size: 12px;
          line-height: 20px;
        }

        .back-link {
          display: flex;
          align-items: center;
          gap: 14px;
          color: #006DB1;
          font-family: "Roboto Condensed";
          font-size: 18px;
          line-height: 21.09px;
          text-transform: uppercase;
        }
      }
    }
  }
}

@media (max-width: 992px) {
  .news-show-page > .content {
    flex-direction: column-reverse;
    gap: 25px;

    .col-1 {
      img {
        width: 100%;
        max-width: 100%;
        height: 400px;
        aspect-ratio: 485 / 400;
      }

      h3 {
        margin-top: 30px;
      }
    }

    .col-2 {
      flex: 0 0 auto;
    }
  }
}

@media (max-width: 768px) {
  .news-show-page > .content {
    .col-1 {
      img {
        width: 100%;
        max-width: 100%;
        height: auto;
      }
    }
  }
}
</style>