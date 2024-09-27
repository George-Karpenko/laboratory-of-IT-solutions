<template>
  <div class="box-products-slider">
    <div class="content-width mx-auto products-slider-container">
      <div class="box-title">
        <h2>Продукция</h2>

        <span>Только лучшие товары из нашего каталога</span>
      </div>

      <div class="swiper-container">
        <div ref="swiper" class="swiper">
          <div ref="swiper-wrapper" class="swiper-wrapper">
            <div v-for="product in products" class="product swiper-slide">
              <div class="box-image">
                <img :src="product.image" :alt="product.name" />
              </div>

              <div class="name">{{ product.name }}</div>
            </div>
          </div>
        </div>

        <div ref="prev" class="swiper-button-prev" role="button" tabindex="0">
          <Icon name="arrow-left" />
        </div>

        <div ref="next" class="swiper-button-next" role="button" tabindex="0">
          <Icon name="arrow-right" />
        </div>

        <div ref="swiper-pagination" class="swiper-pagination"></div>
      </div>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Navigation, Pagination} from "swiper/modules";

export default defineComponent({
  name: "ProductsSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      slidesPerView: 1.2,
      spaceBetween: 20,
      navigation: {
        nextEl: this.$refs.next,
        prevEl: this.$refs.prev,
      },
      pagination: {
        el: this.$refs["swiper-pagination"]
      },
      modules: [
        Navigation,
        Pagination
      ],
      breakpoints: {
        768: {
          slidesPerView: 4
        }
      }
    })
  },
  beforeUnmount() {
    this.swiper.destroy()
  },
  data() {
    return {
      swiper: null
    }
  },
  computed: {
    products() {
      const products = [
        { name: 'Дверь SUPER HR-12 ударная', image: '/images/product_1.png' },
        { name: 'Шуруповерт MAXIMUM POWER 1204', image: '/images/product_2.png' },
      ]

      const result = []

      for (let i = 0; i < 8; i++) {
        result.push(...products)
      }

      return result
    }
  }
})
</script>

<style scoped lang="scss">
.box-products-slider {
  background-color: #F6F8F9;

  .products-slider-container {
    padding-top: 110px;
    padding-bottom: 110px;
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

    .product {
      display: flex;
      align-items: center;
      gap: 20px;

      .box-image {
        flex: 0 0 100px;
        width: 100px;
        height: 100px;

        img {
          width: 100%;
          height: 100%;
          object-fit: cover;
        }
      }

      .name {
        color: #171717;
        font-size: 16px;
        line-height: 24px;

      }
    }
  }

  .swiper-container {
    position: relative;
  }

  .swiper-button-next, .swiper-button-prev {
    z-index: 100;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    width: 50px;
    height: 50px;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #006DB1;
  }

  .swiper-button-next {
    right: -100px;
  }

  .swiper-button-prev {
    left: -100px;
  }

  .swiper-pagination {
    display: none;
    position: relative !important;
    margin-top: 20px !important;
    inset: initial !important;
  }
}

@media (max-width: 768px) {
  .box-products-slider {
    .products-slider-container {
      padding: 50px 20px;

      .box-title {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
      }
    }

    .swiper-pagination {
      display: block;
    }
  }
}
</style>