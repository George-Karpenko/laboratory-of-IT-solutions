<template>
  <div class="swiper-container">

    <div ref="swiper" class="swiper">
      <div ref="swiper-wrapper" class="swiper-wrapper">
        <div v-for="worker in department.workers" class="worker swiper-slide">
          <div class="box-image"></div>
          <div class="worker-name">{{ worker }}</div>
        </div>
      </div>

      <div ref="swiper-pagination" class="swiper-pagination"></div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Pagination} from "swiper/modules";

export default defineComponent({
  name: "Department",
  props: {
    department: {
      type: Object,
      required: true
    }
  },
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 2,
      spaceBetween: 20,
      pagination: {
        el: this.$refs["swiper-pagination"]
      },
      modules: [
        Pagination
      ],
      breakpoints: {
        576: {
          slidesPerView: 4
        },
        992: {
          slidesPerView: 5
        },
        1280: {
          slidesPerView: 6
        }
      },
    })
  },
  beforeUnmount() {
    this.swiper.destroy()
  },
  data() {
    return {
      swiper: null
    }
  }
})
</script>

<style scoped lang="scss">
.department {
  display: flex;
  flex-direction: column;
  gap: 50px;
}

.department-name {
  margin: 0;
}

.workers-list {
  display: flex;
  gap: 20px;
}

.worker {
  width: 182px;
  display: flex;
  flex-direction: column;
  gap: 17px;

  .box-image {
    width: 100%;
    height: 199px;
    border: 1px solid #E0E8EC;
  }

  .worker-name {
    font-size: 18px;
    line-height: 24px;
    font-family: "Roboto Condensed";
    text-align: center;
  }
}

.swiper-wrapper {
  display: flex;
}

.swiper-pagination {
  position: relative !important;
  margin-top: 20px !important;
  inset: initial !important;
}

@media (max-width: 768px) {
  .worker {
    .box-image {
      height: 131px;
    }
  }
}
</style>