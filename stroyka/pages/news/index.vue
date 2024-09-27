<template>
  <div class="content-width mx-auto">
    <Breadcrumbs :items="breadcrumbs" />

    <h1>Новости</h1>

    <div class="box-news">
      <div class="news-list">
        <template v-for="(item, index) in filteredNews">
          <NuxtLink to="/news/1" class="news">
            <div class="box-image">
              <img :src="item.image" :alt="item.title">
            </div>

            <div class="content">
              <div class="date">{{ item.date }}</div>

              <div class="title">{{ item.title }}</div>

              <div class="description">{{ item.description }}</div>

              <div class="category">{{ item.category }}</div>
            </div>
          </NuxtLink>

          <div v-if="index !== filteredNews.length - 1" class="line"></div>
        </template>
      </div>

      <div class="news-categories">
        <button
            type="button"
            class="category"
            :class="{'active': category === null}"
            @click="category = null"
        >
          Все
        </button>

        <button
            v-for="item in categories"
            type="button"
            class="category"
            :class="{'active': category === item.name}"
            @click="category = item.name"
        >
          {{ item.name }}
        </button>
      </div>
    </div>

    <Pagination
        :pages="[1, 2, 3, 4, 5]"
        :current-page="page"
        @change="(value) => page = value"
    />
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "index",
  data() {
    return {
      category: null,
      page: 2
    }
  },
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Новости'},
      ]
    },
    news() {
      return [
        {
          title: 'Технический заказчик генерального подрядчика',
          description: 'Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях.',
          category: 'Наши объекты',
          date: '1 сентября 2021',
          image: '/images/news_1.png'
        },
        {
          title: 'Строительство в труднодоступных местах',
          description: 'Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях.',
          category: 'Строительство',
          date: '1 сентября 2021',
          image: '/images/news_2.png'
        },
        {
          title: 'Торговый центр в Московской области',
          description: 'Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях.',
          category: 'Наши объекты',
          date: '1 сентября 2021',
          image: '/images/news_3.png'
        },
        {
          title: 'Новый объект: спортивный комплекс в Ленинградской области',
          description: 'Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях.',
          category: 'Наши объекты',
          date: '1 сентября 2021',
          image: '/images/news_1.png'
        },
        {
          title: 'Строительство в труднодоступных местах',
          description: 'Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях. Небольшое описание новости в несколько строчек. Текст о новости и ее ключевых особенностях.',
          category: 'Строительство',
          date: '1 сентября 2021',
          image: '/images/news_2.png'
        },
      ]
    },
    filteredNews() {
      if (this.category) {
        return this.news.filter(n => n.category === this.category)
      }

      return this.news
    },
    categories() {
      return [
        {name: 'Новости компании'},
        {name: 'Наши объекты'},
        {name: 'Технологии'},
        {name: 'Проектирование'},
        {name: 'Строительство'},
      ]
    }
  }
})
</script>

<style scoped lang="scss">
.box-news {
  margin-top: 60px;
  display: flex;
  gap: 90px;

  .news-list {
    flex: 1 1 auto;
    display: flex;
    flex-direction: column;
    gap: 40px;

    .news {
      display: flex;
      gap: 40px;

      .box-image {
        flex: 0 0 auto;
        width: min(303px, 100%);
        height: 262px;

        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
          object-position: bottom;
        }
      }

      .content {
        display: flex;
        flex-direction: column;
        gap: 17px;

        .date {
          color: #838383;
          font-size: 14px;
        }

        .title {
          font-family: "Roboto Condensed";
          font-size: 24px;
          color: #171717;
        }

        .description {
          font-size: 14px;
          color: #171717;
        }

        .category {
          height: 30px;
          width: fit-content;
          padding: 3px 15px;
          color: #5F5F5F;
          font-size: 12px;
          background-color: #F6F8F9;
          display: flex;
          justify-content: center;
          align-items: center;
        }
      }
    }

    .line {
      height: 1px;
      width: 100%;
      background-color: #ECECEC;
    }
  }

  .news-categories {
    flex: 0 0 283px;
    background-color: #F6F8F9;
    padding: 40px 0;
    height: fit-content;
    display: flex;
    flex-direction: column;

    .category {
      cursor: pointer;
      padding: 0;
      background-color: transparent;
      border: none;
      padding-left: 30px;
      font-size: 14px;
      color: #006DB1;
      height: 40px;
      display: flex;
      align-items: center;

      &.active {
        color: #171717;
        font-weight: 700;
        border-left: 2px solid #006DB1;
      }
    }
  }
}

.pagination {
  width: fit-content;
  margin: 50px auto 110px;
}

@media (max-width: 992px) {
  .box-news {
    .news-list {
      .news {
        flex-direction: column;
        gap: 30px;

        .box-image {
          height: 242px;
        }
      }
    }
  }
}

@media (max-width: 768px) {
  .box-news {
    flex-direction: column-reverse;
    gap: 25px;

    .news-categories {
      flex: 0 0 auto;
      padding: 0;
    }

    .news-list {
      gap: 30px;

      .news {
        flex-direction: column;
        gap: 30px;

        .box-image {
          height: 242px;
        }
      }
    }
  }

  .pagination {
    margin: 50px auto 50px;
  }
}
</style>