<template>
  <div class="content-width mx-auto">
    <Breadcrumbs :items="breadcrumbs" />

    <h1>Проекты</h1>
  </div>

  <img src="~/assets/images/map_1.png" class="map" alt="">

  <div class="content-width mx-auto">
    <Tabs :tabs="tabs" :active-tab="tab" @change="(value) => tab = value" />

    <div class="projects-list">
      <ProjectCard
          v-for="project in projects"
          :project="project"
      />
    </div>

    <Pagination :pages="[1, 2, 3, 4, 5]" :current-page="page" @change="(value) => page = value" />
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import {PROJECTS} from "~/helpers/constants.js";

export default defineComponent({
  name: "index",
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
        {name: 'Проекты'},
      ]
    },
    tabs() {
      return [
        { name: 'Все', slug: 'all' },
        { name: 'Образовательные учреждения', slug: 'institutions' },
        { name: 'Офисы', slug: 'offices' },
        { name: 'Ангары', slug: 'hangars' },
      ]
    },
    projects() {
      const projects = PROJECTS

      const result = []

      for (let i = 0; i < 4; i++) {
        result.push(...projects)
      }

      return result
    }
  }
})
</script>

<style scoped lang="scss">
.map {
  width: 100%;
  height: 650px;
  object-fit: cover;
  margin-top: 60px;
}

.tabs {
  margin-top: 60px;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 25px;
}

.projects-list {
  margin-bottom: 50px;
  display: flex;
  flex-wrap: wrap;
  gap: 40px 20px;
}

.pagination {
  width: fit-content;
  margin-left: auto;
  margin-right: auto;
  margin-bottom: 110px;
}

@media (max-width: 1280px) {
  .projects-list {
    justify-content: center;
  }
}

@media (max-width: 768px) {
  .map {
    margin-top: 25px;
    height: 440px;
  }

  .tabs {
    margin-top: 25px;
  }

  .projects-list {
    gap: 30px 20px;
  }

  .pagination {
    margin-bottom: 50px;
  }
}
</style>