<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm" v-if="entry != null">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">edit</i>
              </div>
              <h4 class="card-title">
                {{ $t('global.edit') }}
                <strong>{{ $t('cruds.settings.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />

              <div class="border p-3 mb-3 rounded">
                <h5>Быстрая замена, доступные сниппеты: </h5>
                <p><code>[BRAND]</code> - будет заменено на бренд автомобиля</p>
                <p><code>[MODEL]</code> - будет заменено на модель автомобиля</p>
                <p><code>[VIN]</code> - будет заменено на последние 4 цифры VIN автомобиля</p>
                <p><code>[YEAR]</code> - будет заменено на год автомобиля</p>
                <p><code>[SEGMENT]</code> - будет заменено на ценовой сегмент автомобиля (low_cost, middle_cost, hight_cost)</p>

              </div>
              <!-- <div class="row"> -->
                <!-- <div class="col-md-12"> -->

                  <div class="border p-3 mb-3 rounded">
                  <h5 class="mb-4 font-weight-bold">Настройки сегментов: </h5>

                  <div
                    class="form-group bmd-form-group mb-4"
                    :class="{
                      'has-items': entry.min_price,
                      'is-focused': activeField == 'min_price'
                    }"
                  >
                    <label class="bmd-label-floating ">Минимальная цена среднего сегмента</label>
                    <input
                      class="form-control"
                      type="number"
                      v-model="entry.min_price"
                      @focus="focusField('min_price')"
                      @blur="clearFocus"
                    />
                  </div>

                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.max_price,
                      'is-focused': activeField == 'max_price'
                    }"
                  >
                    <label class="bmd-label-floating ">Максимальная цена среднего сегмента</label>
                    <input
                      class="form-control"
                      type="number"
                      v-model="entry.max_price"
                      @focus="focusField('max_price')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>

                <div class="border p-3 mb-3 rounded">
                  <h5 class="mb-4 font-weight-bold">Общие настройки: </h5>

                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.emails,
                      'is-focused': activeField == 'emails'
                    }"
                  >
                    <label class="bmd-label-floating ">Почта для заявок(через запятую если много)</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.emails"
                      @focus="focusField('emails')"
                      @blur="clearFocus"
                    />
                  </div>

                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.asp_link,
                      'is-focused': activeField == 'asp_link'
                    }"
                  >
                    <label class="bmd-label-floating ">Ссылка на asp</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.asp_link"
                      @focus="focusField('asp_link')"
                      @blur="clearFocus"
                    />
                  </div>

                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.export_link,
                      'is-focused': activeField == 'export_link'
                    }"
                  >
                    <label class="bmd-label-floating ">Ссылка на XML-экспорт</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.export_link"
                      @focus="focusField('export_link')"
                      @blur="clearFocus"
                    />
                  </div>

                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.telegram_id,
                      'is-focused': activeField == 'telegram_id'
                    }"
                  >
                    <label class="bmd-label-floating ">ID Telegram для уведомлений</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.telegram_id"
                      @focus="focusField('telegram_id')"
                      @blur="clearFocus"
                    />
                  </div>


                </div>

                <div class="border p-3 mb-3 rounded">
                  <h5 class="mb-4 font-weight-bold">Настройка UTM: </h5>

                  <div
                    class="form-group bmd-form-group mb-4"
                    :class="{
                      'has-items': entry.utm_source,
                      'is-focused': activeField == 'utm_source'
                    }"
                  >
                    <label class="bmd-label-floating ">{{
                      $t('cruds.settings.fields.utm_source')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.utm_source"
                      @focus="focusField('utm_source')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group mb-4"
                    :class="{
                      'has-items': entry.utm_medium,
                      'is-focused': activeField == 'utm_medium'
                    }"
                  >
                    <label class="bmd-label-floating ">{{
                      $t('cruds.settings.fields.utm_medium')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.utm_medium"
                      @focus="focusField('utm_medium')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group mb-4"
                    :class="{
                      'has-items': entry.utm_term,
                      'is-focused': activeField == 'utm_term'
                    }"
                  >
                    <label class="bmd-label-floating ">{{
                      $t('cruds.settings.fields.utm_term')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.utm_term"
                      @focus="focusField('utm_term')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group mb-4"
                    :class="{
                      'has-items': entry.utm_term,
                      'is-focused': activeField == 'utm_content'
                    }"
                  >
                    <label class="bmd-label-floating ">{{
                      $t('cruds.settings.fields.utm_content')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.utm_content"
                      @focus="focusField('utm_content')"
                      @blur="clearFocus"
                    />
                  </div>
                  <div
                    class="form-group bmd-form-group"
                    :class="{
                      'has-items': entry.utm_term,
                      'is-focused': activeField == 'utm_campaign'
                    }"
                  >
                    <label class="bmd-label-floating ">{{
                      $t('cruds.settings.fields.utm_campaign')
                    }}</label>
                    <input
                      class="form-control"
                      type="text"
                      v-model="entry.utm_campaign"
                      @focus="focusField('utm_campaign')"
                      @blur="clearFocus"
                    />
                  </div>
                </div>
                  
                  
                <!-- </div> -->
              <!-- </div> -->
            </div>
            <div class="card-footer">
              <vue-button-spinner
                class="btn-primary"
                :status="status"
                :isLoading="loading"
                :disabled="loading"
              >
                {{ $t('global.save') }}
              </vue-button-spinner>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'

export default {
  data() {
    return {
      status: '',
      activeField: '',
      entry: null,
    }
  },
  computed: {
    ...mapGetters('Settings', ['loading'])
  },
  beforeDestroy() {
    this.resetState()
  },

  async mounted(){
    console.log('mounted')
    this.resetState()
    this.entry = await this.fetchEditData()
    // console.log(this.entry);

  },
  methods: {
    ...mapActions('Settings', [
      'fetchEditData',
      'updateData',
      'resetState',
      'setEntry',
    ]),
   
    submitForm() {
      this.setEntry(this.entry);
      this.updateData()
        .then(() => {
          // this.$router.push({ name: 'settings' })
          this.$eventHub.$emit('update-success')
        })
        .catch(error => {
          this.status = 'failed'
          _.delay(() => {
            this.status = ''
          }, 3000)
        })
    },
    focusField(name) {
      this.activeField = name
    },
    clearFocus() {
      this.activeField = ''
    }
  }
}
</script>
