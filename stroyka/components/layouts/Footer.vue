<template>
  <footer>
    <div class="row-1 content-width mx-auto align-items-start justify-content-xl-between">
      <NuxtLink to="/services" class="link">Каталог услуг</NuxtLink>
      <NuxtLink to="/" class="link">Каталог <br class="d-block d-xl-none"> продукции</NuxtLink>

      <AboutDropdown />

      <NuxtLink to="/projects" class="link">Наши проекты</NuxtLink>
      <NuxtLink to="/news" class="link">Блог</NuxtLink>
      <NuxtLink to="/contacts" class="link">Контакты</NuxtLink>
    </div>

    <div class="content-width mx-auto line mb-30 mb-xl-50"></div>

    <div class="row-2 content-width mx-auto">
      <Icon name="logo-2" class="logo" />

      <div class="column column_1">
        <span class="title">© 2021 «СтройСтальПроект»</span>

        <NuxtLink to="/">Политика обработки персональных
          данных</NuxtLink>

        <NuxtLink to="/">Политика конфиденциальности</NuxtLink>
      </div>

      <div class="column column_2">
        <div class="card">
          <Icon name="geo" />

          <div>
            <span class="title">Адрес</span>
            <span>г. Санкт-Петербург, <br> Ленинский пр.,  д.140А</span>
          </div>
        </div>
      </div>

      <div class="column column_3">
        <div class="card">
          <Icon name="watch" />

          <div>
            <span class="title">Режим работы</span>
            <span>Ежедневно <br> с 10:00 до 18:00</span>
          </div>
        </div>
      </div>

      <div class="column column_phone-email">
        <a href="tel:+7 (812) 4260-1046" target="_blank" class="phone">+7 (812) 4260-1046</a>

        <a href="mailto:info@lstk-home.com" target="_blank" class="email">
          <Icon name="email" />
          <span>info@lstk-home.com</span>
        </a>
      </div>
    </div>

    <div class="row-3">
      <div class="content-width mx-auto">
        <div class="text">
          Юр. адрес: 198216, г. Санкт-Петербург, Ленинский пр., <br>
          д. 140, литера А, помещение 5-Н, офис 209А
        </div>

        <div class="text text_1">
          ИНН: 7805747616 <br>
          КПП: 780501001
        </div>

        <div class="text text_2">
          ОГРН: 1197847072620 <br>
          БИК: 044525999
        </div>

        <div class="text text-with-logo">
          <span>Разработка сайта</span>

          <img src="~/assets/images/profit_kit.png" width="97" height="22" alt="profit kit">
        </div>
      </div>
    </div>
  </footer>
</template>

<script lang="ts">
import {defineComponent} from 'vue'

export default defineComponent({
  name: "Footer"
})
</script>

<style scoped lang="scss">
footer {
  background-color: #006DB1;

  .row-1 {
    padding-top: 30px;
    height: 90px;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .link {
      height: 58px;
      display: flex;
      align-items: center;
      text-transform: uppercase;
      color: #FFFFFF;
      font-size: 18px;
      font-weight: 400;
      font-family: "Roboto Condensed";
      white-space: nowrap;
    }
  }

  .line {
    margin-top: 30px;
    margin-bottom: 50px;
    height: 1px;
    background-color: #FFFFFF10;
  }

  .row-2 {
    margin-bottom: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;

    .logo {
      min-width: 92px;
    }

    .column {
      display: flex;
      flex-direction: column;
      gap: 13px;
      color: #FFF;
      font-size: 14px;

      a {
        color: #FFF;
      }

      .title {
        color: #9AC2DB;
      }

      .card {
        display: flex;
        gap: 18px;

        svg {
          margin-top: 5px;
        }

        & > div {
          display: flex;
          flex-direction: column;
          gap: 4px;
        }
      }
    }

    .column_phone-email {
      display: flex;
      flex-direction: column;
      gap: 0;

      .phone {
        font-family: "Roboto Condensed";
        font-size: 22px;
      }

      .email {
        display: flex;
        align-items: center;
        gap: 10px;
      }
    }
  }

  .row-3 {
    height: 118px;
    background-color: #FFFFFF1A;

    & > div {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .text {
      color: #9AC2DB;
      font-size: 14px;
    }

    .text-with-logo {
      display: flex;
      align-items: center;
      gap: 15px;
    }
  }

  @media (max-width: 1100px) {
    .row-1 {
      gap: 10px 40px;
      height: auto;
      flex-direction: column;
      flex-wrap: wrap;
      align-items: flex-start;
      max-height: 170px;

      .link {
        font-size: 16px;
        line-height: 24px;
        height: auto;
      }
    }

    .row-2 {
      flex-wrap: wrap;
      gap: 20px 15px;

      .logo {
        flex: 0 0 66px;
        min-width: 66px;
        width: 66px;
        height: 56px;
      }

      .column_1 {
        flex: 1 1 calc(100% - 81px);
        font-size: 12px;

        .title {
          font-size: 12px;
        }
      }
    }

    .row-3 {
      padding-top: 30px;
      padding-bottom: 30px;
      height: auto;

      & > div {
        height: auto;
        flex-wrap: wrap;
        gap: 15px 28px;
      }

      .text_1, .text_2 {
        width: calc(50% - 14px);
      }
    }
  }
}
</style>