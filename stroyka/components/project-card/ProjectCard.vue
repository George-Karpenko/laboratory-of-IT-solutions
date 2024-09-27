<template>
  <NuxtLink to="/projects/1" class="project-card">
    <div class="box-image">
      <img :src="project.image" :alt="project.name">
    </div>

    <div class="box-content">
      <div class="name">{{ project.name }}</div>

      <div v-if="!hideDescription" class="description">{{ project.description }}</div>

      <div class="location">
        <Icon name="geo" />
        <span>{{ project.location }}</span>
      </div>
    </div>
  </NuxtLink>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "ProjectCard",
  props: {
    project: {
      type: Object,
      required: true
    },
    hideDescription: {
      type: Boolean,
      default: false
    }
  }
})
</script>

<style scoped lang="scss">
.project-card {
  width: 384px;
  display: flex;
  flex-direction: column;
  gap: 20px;

  .box-image {
    width: 100%;
    height: 300px;

    img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  }

  .box-content {
    display: flex;
    flex-direction: column;
    gap: 11px;

    .name {
      color: #171717;
      font-size: 20px;
      font-family: "Roboto Condensed";
    }

    .description {
      color: #484848;
      font-size: 14px;
    }

    .location {
      color: #006DB1;
      font-size: 14px;
    }
  }
}

@media (max-width: 576px) {
  .project-card {
    .box-image {
      height: 219px;
    }

    .box-content {
      .name {
        font-size: 18px;
        line-height: 24px;
      }
    }
  }
}
</style>