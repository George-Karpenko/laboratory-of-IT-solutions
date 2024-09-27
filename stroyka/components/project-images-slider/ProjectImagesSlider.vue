<template>
  <div class="box-project-images-slider">
    <div ref="swiper" class="swiper">
      <div ref="swiper-wrapper" class="swiper-wrapper">
        <div v-for="item in 10" class="swiper-slide">
          <img src="~/assets/images/project_slider_1.png" alt="">
        </div>
      </div>
    </div>

    <div ref="prev" class="swiper-button-prev" role="button" tabindex="0">
      <Icon name="arrow-left" />
    </div>

    <div ref="next" class="swiper-button-next" role="button" tabindex="0">
      <Icon name="arrow-right" />
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'
import Swiper from "swiper";
import {Navigation} from "swiper/modules";

export default defineComponent({
  name: "ProjectImagesSlider",
  mounted() {
    this.swiper = new Swiper(this.$refs.swiper, {
      navigation: {
        nextEl: this.$refs.next,
        prevEl: this.$refs.prev,
      },
      modules: [
        Navigation
      ]
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
 .box-project-images-slider {
   position: relative;
   width: 100%;
   height: 100%;
   overflow: hidden;

   .swiper {
     width: 100%;
     height: 100%;
   }

   .swiper-wrapper {
     position: relative;
     width: 100%;
     height: 100%;
     z-index: 1;
     display: flex;
     justify-content: flex-start;
     align-items: flex-start;
   }

   .swiper-slide {
     flex: 0 0 100%;
     width: 100%;
     height: 100%;
   }


   img {
     width: 100%;
     height: 100%;
     object-fit: cover;
   }

   .swiper-button-next, .swiper-button-prev {
     background: #FFFFFF73;
     z-index: 100;
     position: absolute;
     top: 50%;
     transform: translateY(-50%);
     cursor: pointer;
     width: 60px;
     height: 60px;
     display: flex;
     justify-content: center;
     align-items: center;
     color: #006DB1;
   }

   .swiper-button-next {
     right: 60px;
   }

   .swiper-button-prev {
     left: 60px;
   }
 }

 @media (max-width: 576px) {
   .box-project-images-slider {
     .swiper-button-next, .swiper-button-prev {
       width: 50px;
       height: 50px;
     }

     .swiper-button-next {
       right: 0;
     }

     .swiper-button-prev {
       left: 0;
     }
   }
 }
</style>