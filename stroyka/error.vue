<template>
  <NuxtLayout>
    <div class="content-width mx-auto">
      <Breadcrumbs :items="breadcrumbs" />

      <h1>Страница не найдена</h1>

      <div class="d-flex flex-column-reverse flex-xl-row gap-25 gap-xl-77 mt-25 mt-xl-60 mb-50 mb-xl-110">
        <img src="~/assets/images/404.png" width="577" height="450" alt="Страница не найдена" class="image-404">

        <div class="d-flex flex-column gap-44 mt-0 mt-xl-85">
          <span class="fs-22 text-gray text-center text-xl-start">Возможно она была <br> удалена или перемещена</span>

          <div class="d-flex flex-column flex-xl-row gap-10">
            <NuxtLink to="/" class="btn-404 btn-404_primary justify-content-center">«&nbsp;&nbsp;&nbsp;на главную</NuxtLink>

            <NuxtLink to="/" class="btn-404 btn-404_outline-primary justify-content-center">в каталог решений&nbsp;&nbsp;&nbsp;»</NuxtLink>
          </div>
        </div>
      </div>
    </div>
  </NuxtLayout>
</template>

<script>
import Breadcrumbs from "~/components/breadcrumbs/Breadcrumbs.vue";

export default {
  name: "error",
  components: {Breadcrumbs},
  props: {
    error: {
      Type: Object
    }
  },
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Страница не найдена'}
      ]
    }
  }
}
</script>

<style lang="scss" scoped>
.image-404 {
  max-width: 100%;
  height: auto;
  object-fit: cover;
  aspect-ratio: 577 / 450;
}

.btn-404 {
  height: 60px;
  display: flex;
  align-items: center;
  font-size: 18px;
  font-weight: 400;
  text-transform: uppercase;
  font-family: "Roboto Condensed";
  transition: all ease-in-out .3s;
}

.btn-404_primary {
  background-color: #006DB1;
  color: #FFF;
  padding: 0 32.5px;
}

.btn-404_primary:hover {
  background-color: #FFA800;
  color: #171717;
}

.btn-404_outline-primary {
  border: 2px solid #006DB1;
  color: #006DB1;
  padding: 0 40px;

  &:hover {
    background-color: #006DB1;
    color: #FFFFFF;
  }
}
</style>