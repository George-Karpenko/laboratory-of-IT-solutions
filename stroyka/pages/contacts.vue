<template>
  <div class="content-width mx-auto">
    <Breadcrumbs :items="breadcrumbs" />

    <h1>Контакты</h1>

    <div class="box-compass">
      <div class="box-icon">
        <CompassIcon />
      </div>

      <div class="description">
        Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще. Произвольный текст на странице компании о компании или о чем-то еще.
      </div>
    </div>
  </div>

  <Offices />

  <div class="bg-feedback">
    <div class="content-width mx-auto box-feedback">
      <div class="box-title">
        <h2>Есть вопросы?</h2>

        <span>Напишите нам и мы ответим</span>
      </div>

      <form action="#" class="form-feedback">
        <div class="col-1">
          <div class="row">
            <input type="text" placeholder="ФИО">

            <input type="email" placeholder="E-mail *">
          </div>

          <div class="row">
            <textarea placeholder="Вопрос"></textarea>
          </div>
        </div>

        <div class="col-2">
          <div class="required-text">* — обязательно для заполнения</div>

          <div class="checkbox-privacy">
            <input id="checkbox-privacy" type="checkbox" name="privacy">
            <label for="checkbox-privacy">
              Принимаю <a href="#">политику обработки <br> персональных данных</a> и <a href="#">политику <br> конфиденциальности</a>
            </label>
          </div>

          <button type="submit" class="btn-submit">Отправить</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import {defineComponent} from 'vue'

export default defineComponent({
  name: "contacts",
  data() {
    return {

    }
  },
  computed: {
    breadcrumbs() {
      return [
        {name: 'Главная', to: '/'},
        {name: 'Контакты'},
      ]
    },
  }
})
</script>

<style scoped lang="scss">
.box-compass {
  margin-top: 60px;
  display: flex;
  align-items: center;
  gap: 60px;

  .box-icon {
    flex:  0 0 182px;
    width: 182px;
    height: 182px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #006DB1;
  }

  .description {
    font-size: 16px;
    line-height: 24px;
    color: #484848;
  }
}

.box-feedback {
  padding-top: 110px;
  padding-bottom: 110px;
  display: flex;
  flex-direction: column;
  gap: 42px;

  .box-title {
    display: flex;
    align-items: center;
    gap: 50px;

    span {
      color: #484848;
      font-size: 18px;
    }
  }

  .form-feedback {
    display: flex;
    gap: 40px;

    .col-1 {
      flex: 1 1 auto;
      display: flex;
      flex-direction: column;
      gap: 15px;

      .row {
        width: 100%;
        display: flex;
        gap: 20px;

        input, textarea {
          flex-grow: 1;
          background-color: #FFFFFF;
          padding: 12px 25px 14px 25px;
          border: 1px solid #E0E8EC;
          outline: none;
          font-size: 16px;
          line-height: 24px;
          font-family: "Montserrat";

          &::placeholder {
            color: #484848;
          }
        }

        textarea {
          height: 110px;
          resize: none;
        }
      }
    }

    .col-2 {
      flex:  0 0 auto;
      display: flex;
      flex-direction: column;
      gap: 15px;

      .checkbox-privacy {
        display: flex;
        align-items: flex-start;
        gap: 15px;

        input {
          display: block;
          flex: 0 0 22px;
          width: 22px;
          height: 22px;
          background-color: #FFFFFF;
          border-radius: 0;
          outline: none;
          padding: 0;
          margin: 0;
          border: 1px solid #E0E8EC;
        }

        label {
          color: #171717;
          font-size: 14px;
          line-height: 20px;

          a {
            color: #006DB1;
          }
        }
      }
    }
  }

  .required-text {
    font-size: 14px;
    color: #838383;
  }

  .btn-submit {
    cursor: pointer;
    margin-top: 5px;
    height: 60px;
    border: none;
    background-color: #006DB1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 40px;
    font-size: 18px;
    font-family: "Roboto Condensed";
    text-transform: uppercase;
    color: #FFF;
  }
}

.bg-feedback {
  width: 100%;
  background-color: #F6F8F9;
}

@media (max-width: 768px) {
  .box-compass {
    margin-top: 15px;

    .box-icon {
      display: none;
    }
  }

  .box-feedback {
    padding-bottom: 50px;

    .box-title {
      flex-direction: column;
      align-items: flex-start;
      gap: 6px;
    }

    .form-feedback {
      flex-direction: column;
      gap: 15px;

      .col-1 {
        .row {
          flex-direction: column;
        }
      }
    }
  }
}
</style>