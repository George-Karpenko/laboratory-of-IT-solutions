import { defineStore } from "pinia";

export default defineStore("slide", {
  state: () => {
    return {
      slides: [],
      slideIndex: 0,
    };
  },
  getters: {
    slide: (state) => state.slides[state.slideIndex],
  },
  actions: {
    async saveSlides() {
      if (this.slides.length > 0) {
        return;
      }
      const response = await fetch("http://localhost/api/slides");
      this.slides = (await response.json()).data;
    },
    prevSlide() {
      if (this.slideIndex === 0) {
        this.slideIndex = this.slides.length - 1;
        return;
      }
      this.slideIndex -= 1;
    },
    nextSlide() {
      if (this.slideIndex === this.slides.length - 1) {
        this.slideIndex = 0;
        return;
      }
      this.slideIndex += 1;
    },
  },
});
