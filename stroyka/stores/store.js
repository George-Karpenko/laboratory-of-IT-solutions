import { defineStore } from "pinia";
import slide from "./slide";

export const useMainStore = defineStore("main", {
  state: () => {
    return {
      innerWidth: window ? window.innerWidth : null,
      scrollTop: document ? document.documentElement.scrollTop : null,
      isShowFeedbackModal: false,
      isOpenSearch: false,
    };
  },
  actions: {
    openFeedbackModal() {
      this.isShowFeedbackModal = true;
    },
    closeFeedbackModal() {
      this.isShowFeedbackModal = false;
    },
    openSearch() {
      this.isOpenSearch = true;
    },
    closeSearch() {
      this.isOpenSearch = false;
    },
  },
});

export const useSlideStore = slide;
