<template>
  <div class="content-width mx-auto">
    <Breadcrumbs :items="breadcrumbs" />

    <h1>Сертификаты и лицензии</h1>

    <Tabs :tabs="tabs" :active-tab="tab" class="mx-auto" @change="changeTab" />

    <div class="certificates-list">
      <div
          v-for="certificate in certificates"
          class="certificate-card"
      >
        <img :src="certificate.image" :alt="'Сертификат ' + certificate.name">

        <div class="name">{{ certificate.name }}</div>
      </div>
    </div>

    <Pagination :pages="pages" :current-page="page" class="mx-auto" @change="changePage" />
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "certificates",
  data() {
    return {
      tab: 'all',
      page: 2
    }
  },
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'О нас', to: '/about'},
        {name: 'Сертификаты и лицензии', to: '/certificates'},
      ]
    },
    tabs() {
      return [
        { name: 'Все', slug: 'all' },
        { name: 'Строительство', slug: 'construction' },
        { name: 'Проектирование', slug: 'designing' },
        { name: 'Технологии', slug: 'technologies' },
      ]
    },
    pages() {
      return [1, 2, 3, 4, 5]
    },
    certificates() {
      const certificates = [
        { name: 'Сертификат соответствия строительных работ', image: '/images/certificate_1.png' },
        { name: 'Лицензия на строительные работы', image: '/images/certificate_2.png' },
        { name: 'Сертификат на краску', image: '/images/certificate_3.png' },
        { name: 'Сертификат на краску', image: '/images/certificate_3.png' },
      ]

      const result = []

      for (let i = 0; i < 5; i++) {
        result.push(...certificates)
      }

      return result
    }
  },
  methods: {
    changeTab(tab) {
      this.tab = tab
    },
    changePage(page) {
      this.page = page
    }
  }
})
</script>

<style scoped lang="scss">
h1 {
  margin-bottom: 60px;
}

.certificates-list {
  margin-top: 40px;
  display: flex;
  flex-wrap: wrap;
  gap: 50px 20px;

  .certificate-card {
    width: 222px;
    display: flex;
    flex-direction: column;
    gap: 15px;

    img {
      width: 100%;
      height: 314px;
      object-fit: cover;
    }

    .name {
      text-align: center;
      font-size: 14px;
    }
  }
}

.pagination {
  margin-top: 50px;
  margin-bottom: 110px;
}

@media (max-width: 1300px) {
  .certificates-list {
    .certificate-card {
      width: calc(100% / 4 - 20px);

      img {
        height: auto;
      }
    }
  }
}

@media (max-width: 992px) {
  .certificates-list {
    .certificate-card {
      width: calc(100% / 3 - 20px);
    }
  }
}

@media (max-width: 768px) {
  .certificates-list {
    .certificate-card {
      width: calc(50% - 10px);

      img {
        height: auto;
      }
    }
  }
}
</style>