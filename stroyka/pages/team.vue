<template>
  <div class="box-intro">
    <div class="content-width mx-auto">
      <Breadcrumbs :items="breadcrumbs" class="white" />

      <h1 class="white">Команда</h1>

      <div class="description">
        В нашем штате работают только <span class="text-orange">лучшие специалисты в своей области</span> и профессионалы своего дела. Наша компания основана более 10 лет
      </div>

      <h3 class="white">Дирекция</h3>

      <DirectorsList />
    </div>
  </div>

  <div class="content-width mx-auto box-departments">
    <Department v-for="department in departments" :department="department" />
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Department from "~/components/department/Department.vue";
import DirectorsList from "~/components/directors-list/DirectorsList.vue";

export default defineComponent({
  name: "team",
  components: {
    DirectorsList,
    Department
  },
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'О нас'},
        {name: 'Команда'},
      ]
    },
    departments() {
      return [
        { name: 'Название отдела', workers: ['Иванов Сергей Иванович', 'Симонова Ольга Петровна', 'Приходько Александр Семенович', 'Иванов Сергей Иванович', 'Мухамедов Али Камилевич', 'Петров Константин Константинович'] },
        { name: 'Еще один отдел', workers: ['Иванов Сергей Иванович', 'Симонова Ольга Петровна', 'Приходько Александр Семенович', 'Ким Ольга Дмитриевна', 'Мухамедов Али Камилевич'] },
        { name: 'Еще один отдел', workers: ['Иванов Сергей Иванович', 'Симонова Ольга Петровна', 'Приходько Александр Семенович', 'Ким Ольга Дмитриевна'] },
      ]
    }
  }
})
</script>

<style scoped lang="scss">
.box-intro {
  padding: 1px;
  background-image: url(./../assets/images/team_bg.png);
  background-repeat: no-repeat;
  //background-size: 100% auto;
  background-size: 100% 820px;
  background-position: top;

  .description {
    margin-top: 60px;
    margin-bottom: 110px;
    width: min(887px, 100%);
    font-size: 26px;
    line-height: 37px;
    font-weight: 700;
    color: #FFF;
    text-transform: uppercase;

    .text-orange {
      color: #FFA800;
    }
  }

  h3 {
    margin-bottom: 50px;
  }
}

.box-departments {
  overflow: hidden;
  margin-top: 110px;
  margin-bottom: 110px;
  display: flex;
  flex-direction: column;
  gap: 110px;
}

@media (max-width: 768px) {
  .box-intro {
    background-size: 100% 550px;

    h3 {
      margin-bottom: 18px;
    }

    .description {
      margin-top: 25px;
      font-size: 16px;
      line-height: 24px;
      margin-bottom: 50px;
    }
  }

  .box-departments {
    gap: 50px;
    margin-top: 50px;
  }
}
</style>