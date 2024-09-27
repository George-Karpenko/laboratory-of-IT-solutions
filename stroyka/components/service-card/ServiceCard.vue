<template>
  <NuxtLink to="/services/1" class="service-card">
    <div class="box-image">
      <img :src="service.image" :alt="'Услуга ' + service.name">
    </div>

    <div class="box-content">
      <div class="title">{{ service.name }}</div>

      <div class="description">{{ service.description }}</div>

      <div class="box-btn">
        <NuxtLink to="/">
          <Icon name="double-arrow-right" />
          <span>Подробнее</span>
        </NuxtLink>
      </div>
    </div>
  </NuxtLink>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "ServiceCard",
  props: {
    service: {
      type: Object,
      required: true
    }
  },
})
</script>

<style scoped lang="scss">
.service-card {
  width: 384px;
  height: 586px;
  background-color: #FFF;
  display: flex;
  flex-direction: column;

  .box-image {
    width: 100%;
    height: 300px;
  }

  .box-content {
    flex: 1 1 auto;
    padding: 35px;
    display: flex;
    flex-direction: column;
  }

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .title {
    font-family: "Roboto Condensed";
    font-size: 24px;
    color: #171717;
  }

  .description {
    margin-top: 15px;
    color: #484848;
    font-size: 14px;
  }

  .box-btn {
    flex: 1 0 auto;
    margin-top: 20px;
    display: flex;
    align-items: flex-end;

    a {
      color: #006DB1;
      font-family: "Roboto Condensed";
      font-size: 18px;
      display: flex;
      align-items: center;
      gap: 14px;
    }
  }
}

@media (max-width: 1300px) {
  .service-card {
    width: calc(100% / 2 - 20px);
  }
}

@media (max-width: 768px) {
  .service-card {
    width: 100%;
    height: auto;

    .box-image {
      height: 219px;
    }

    .title {
      font-size: 18px;
      line-height: 24px;
    }
  }
}
</style>