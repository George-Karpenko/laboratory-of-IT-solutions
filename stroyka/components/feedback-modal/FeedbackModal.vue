<template>
  <Teleport v-if="mainStore.isShowFeedbackModal" to="body">
    <div class="shadow" @click="mainStore.closeFeedbackModal">
      <form class="feedback-modal" @submit.prevent="submit" @click.stop>
        <button type="button" class="btn-close" @click="mainStore.closeFeedbackModal">
          <Icon name="close-menu" />
        </button>

        <div v-if="isSubmit" class="submit-info d-flex flex-column justify-content-center align-items-center mt-70 flex-grow-1">
          <Icon name="feedback-submit" />

          <h4 class="text-center mt-28 mb-10">Ваша <span class="text-primary">заявка</span> принята</h4>

          <p class="text-center text-gray mt-0 mb-0">Мы свяжемся с вами в самое ближайшее время</p>
        </div>

        <div v-else class="form">
          <h4 class="text-center mb-0"><span class="text-primary">Заявка</span> на строительство</h4>

          <p class="text-center text-gray mt-10">Заполните форму и мы свяжемся с вами в самое ближайшее время</p>

          <input type="text" placeholder="ФИО">
          <input type="text" placeholder="Телефон *">
          <input type="text" placeholder="E-mail">
          <textarea placeholder="Комментарий"></textarea>
          <p class="text-center text-grey">* — обязательно для заполнения</p>

          <div class="checkbox-privacy">
            <input id="checkbox-feedback" type="checkbox">
            <label for="checkbox-feedback text-dark">
              Принимаю <a href="#" class="text-primary">политику обработки персональных данных</a> и <a href="#" class="text-primary">политику конфиденциальности</a>
            </label>
          </div>
        </div>

        <button type="submit" class="btn-submit">{{ isSubmit ? 'Ок' : 'Отправить' }}</button>
      </form>
    </div>
  </Teleport>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "FeedbackModal",
  data() {
    return {
      isSubmit: false
    }
  },
  computed: {
    mainStore() {
      return useMainStore()
    }
  },
  methods: {
    submit() {
      if (this.isSubmit) {
        this.mainStore.closeFeedbackModal()
        return
      }

      this.isSubmit = true
    }
  }
})
</script>

<style scoped lang="scss">
.shadow {
  position: fixed;
  inset: 0;
  background-color: #00000030;
  display: flex;
  justify-content: center;
  align-items: center;

  .feedback-modal {
    display: flex;
    flex-direction: column;
    position: relative;
    width: min(515px, 100%);
    background-color: #FFFFFF;
    box-shadow: 0px 4px 25px 0px #395E761A;

    .btn-close {
      cursor: pointer;
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 0;
      background-color: transparent;
      display: flex;
      justify-content: center;
      align-items: center;
      border: none;

      svg {
        width: 16px;
        height: 16px;
      }
    }

    .form {
      padding: 0 60px;
      display: flex;
      flex-direction: column;
      gap: 15px;

      input[type="text"], textarea {
        font-family: "Montserrat";
        font-size: 16px;
        line-height: 24px;
        background-color: #FFFFFF;
        padding: 12px 25px 14px 25px;
        border: 1px solid #E0E8EC;
        outline: none;

        &::placeholder {
          color: #484848;
        }
      }

      input[type="text"] {
        height: 50px;
      }

      textarea {
        height: 103px;
      }

      .checkbox-privacy {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        font-size: 14px;
        line-height: 20px;

        input {
          flex: 0 0 22px;
          width: 22px;
          height: 22px;
        }

        label {
          flex: 1 1 auto;
        }
      }
    }
  }

  .btn-submit {
    cursor: pointer;
    margin-top: 40px;
    width: 100%;
    min-height: 70px;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    color: #FFF;
    font-family: "Roboto Condensed";
    text-transform: uppercase;
    background-color: #006DB1;
    border: none;
  }
}

  @media (max-width: 576px) {
  .shadow {
    .feedback-modal {
      height: 100%;
      width: 100%;
      overflow: scroll;

      .form {
        padding: 0 20px;
      }
    }
  }
}
</style>