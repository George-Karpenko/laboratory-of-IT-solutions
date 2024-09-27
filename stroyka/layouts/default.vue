<template>
  <div id="main">
    <Header v-if="!isIndexPage" />

    <div id="content">
      <slot />
    </div>

    <Footer />
  </div>

  <FeedbackModal />
</template>

<script>
import {defineComponent} from 'vue'
import Header from "~/components/layouts/Header.vue";
import Footer from "~/components/layouts/Footer.vue";
import FeedbackModal from "~/components/feedback-modal/FeedbackModal.vue";

export default defineComponent({
  name: "default",
  components: {
    FeedbackModal,
    Footer,
    Header
  },
  mounted() {
    window.addEventListener('resize', this.handleResize)
    window.addEventListener('scroll', this.handleScroll)
  },
  beforeUnmount() {
    window.removeEventListener('resize', this.handleResize)
    window.removeEventListener('scroll', this.handleScroll)
  },
  computed: {
    mainStore() {
      return useMainStore()
    },
    isIndexPage() {
      return useRoute().name === 'index'
    }
  },
  methods: {
    handleResize() {
      this.mainStore.innerWidth = window.innerWidth
    },
    handleScroll() {
      this.mainStore.scrollTop = document.documentElement.scrollTop
    }
  }
})
</script>


<style scoped lang="scss">

</style>