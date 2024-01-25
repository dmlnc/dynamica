<template>
  <div class="container-fluid">
    <form @submit.prevent="submitForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary card-header-icon">
              <div class="card-icon">
                <i class="material-icons">description</i>
              </div>
              <h4 class="card-title">
                <span v-if="type=='create'">{{ $t('global.create') }}</span> 
                <span v-if="type=='show'">{{ $t('global.show') }}</span>
                <span v-if="type=='edit'">{{ $t('global.edit') }}</span>
                <strong>{{ $t('cruds.service.title_singular') }}</strong>
              </h4>
            </div>
            <div class="card-body">
              <back-button></back-button>
            </div>
            <div class="card-body">
              <bootstrap-alert />
              <div class="steps">
                <div class="steps-header mb-4 d-flex align-items-center justify-content-center justify-content-md-between flex-wrap" style="max-width: 800px; margin: 0 auto;" v-if="type != 'show'">
                  <a href="#" class="btn btn-sm btn-circle mr-2  mb-2 mb-md-0 mr-md-0" v-for="i in steps" :class="{
                    'btn-primary': step == i,
                    'btn-outline-primary' : step != i,
                  }" @click.prevent="()=>{step = i; changeStep()}">
                  
                    <span v-if="i==1">Общее</span>
                    <span v-if="i==2">Салон <span v-if="fieldsEmpty['3.1'] == true" class="badge badge-danger badge-pill">!</span></span>
                    <span v-if="i==3">Подкапотное <span v-if="fieldsEmpty['3.2'] == true" class="badge badge-danger badge-pill">!</span></span>
                    <span v-if="i==4">Средняя <span v-if="fieldsEmpty['3.3'] == true" class="badge badge-danger badge-pill">!</span></span>
                    <span v-if="i==5">Снизу <span v-if="fieldsEmpty['3.4'] == true" class="badge badge-danger badge-pill">!</span></span>
                    <span v-if="i==6">ЛКП</span>
                    <span v-if="i==7">Рекомендовано</span>
                    


                  </a>
                </div>
                <div class="steps-step py-4" id="step-1" v-if="step == 1 || type == 'show'" style="max-width: 850px; margin: 0 auto;">
                  <div class="mb-5" v-if="entry.status == 'published' || entry.status == 'diagnostic'">
                    <h4 class="mt-0 mb-3">Информация</h4>
                    <p>Создано: <b>{{ entry.created_at }}</b></p>
                    <p>Обновлено: <b>{{ entry.updated_at }}</b></p>
                    <p  v-if="entry.diagnost!=null">Диагност: <b>{{ entry.diagnost.name }}</b></p>
                  </div>
                  
                  <div class="steps-step-header">
                    <h4 class="mt-0">Транспортное средство (1/{{ steps }})</h4>
                  </div>
                 
                  <div class="row">
                    <div class="col-md-6">
                      <div
                        class="form-group bmd-form-group mt-3"
                        :class="{
                          'has-items': entry.brand !== null,
                          'is-focused': activeField == 'brand'
                        }"
                      >
                        <label class="bmd-label-floating required">Марка</label>
                        <v-select
                          name="brand"
                          label="name"
                          :key="'brand-field'"
                          :value="entry.brand"
                          :options="lists.brands"
                          :closeOnSelect="true"
                          :clearable="false"
                          @input="(e)=>{updateEntryField('brand',e); updateEntryField('car_model', null) }"
                          :searchable="false"
                          required
                          :disabled="disabledBasic"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div
                        class="form-group bmd-form-group mt-3"
                        :class="{
                          'has-items': entry.car_model !== null,
                          'is-focused': activeField == 'model'
                        }"
                      >
                        <label class="bmd-label-floating required">Модель</label>
                        <v-select
                          name="model"
                          label="name"
                          :key="'model-field'"
                          :value="entry.car_model"
                          :options="models"
                          :closeOnSelect="true"
                          :clearable="false"
                          @input="(e)=>{updateEntryField('car_model',e)}"
                          :searchable="false"
                          required
                          :disabled="disabledBasic"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div
                        class="form-group bmd-form-group mt-3"
                        :class="{
                          'has-items': entry.color,
                          'is-focused': activeField == 'color'
                        }"
                      >
                        <label class="bmd-label-floating required">Цвет</label>
                        <input
                          class="form-control"
                          type="text"
                          :value="entry.color"
                          @input="(e)=>{updateEntryField('color',e.target.value)}"
                          @focus="focusField('color')"
                          @blur="clearFocus"
                          required
                          :readonly="disabledBasic"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div
                        class="form-group bmd-form-group mt-3"
                        :class="{
                          'has-items': entry.vin,
                          'is-focused': activeField == 'vin'
                        }"
                      >
                        <label class="bmd-label-floating required">VIN</label>
                        <input
                          class="form-control"
                          type="text"
                          :value="entry.vin"
                          @input="(e)=>{updateEntryField('vin',e.target.value)}"
                          @focus="focusField('vin')"
                          @blur="clearFocus"
                          required
                          :readonly="disabledBasic"
                        />
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div
                        class="form-group bmd-form-group mt-3"
                        :class="{
                          'has-items': entry.run,
                          'is-focused': activeField == 'run'
                        }"
                      >
                        <label class="bmd-label-floating required">Пробег</label>
                        <input
                          class="form-control"
                          type="text"
                          :value="entry.run"
                          @input="(e)=>{updateEntryField('run',e.target.value)}"
                          @focus="focusField('run')"
                          @blur="clearFocus"
                          required
                          :readonly="disabledBasic"
                        />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label class="bmd-label-floating required">VIN Фото</label>
                      <Attachment 
                        v-if="!loading"
                        @file-uploaded="(e)=>{uploadMediaEntry('vin_media', e)}" 
                        @file-removed="(e)=>{removeMediaEntry('vin_media', e)}" 
                        component="pictures" 
                        :maxFiles="10"
                        route="/api/v1/service_forms/form_media/vin" 
                        collectionName="VIN" 
                        :media="entry.vin_media"
                        :disabled="disabledBasic"
                      />
                    </div>
                  </div>
                </div>
                <div class="steps-step py-4" id="step-2" v-if="step == 2 || type == 'show'" style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header mb-5">
                    <h4 class="mt-0 mb-1">Техническая диагностика (2/{{ steps }})</h4>
                    <h6 class="mt-0 font-weight-bold text-primary">Осмотр из салона автомобиля</h6>

                  </div>
                  <div v-for="(field, index) in fields" v-if="field.section == 3.1">
                    <div class="d-flex">
                      <div 
                        class="d-flex align-items-center justify-content-center text-center "
                        :style="{
                          background: field.value == null ? 'red' : '#4ba82e',
                          color: '#fff',
                          // border: '2px solid white',
                          borderRadius: '50%',
                          width: '30px',
                          height: '30px',
                          flex: '0 0 30px',
                          marginTop: '10px',
                          marginRight: '10px'
                        }"
                      >
                        {{field.order}}
                      </div>
                      <Field 
                        @uploadMedia="uploadCustomFieldMedia" 
                        @removeMedia="removeCustomFieldMedia" 
                        @updateField="updateCustomField" 
                        @updateComment="updateCustomFieldComment" 
                        class="mb-4 w-100" 
                        :field="field" 
                        :entry="entry"
                        :disabled="disabledDiagnostic"
                        :disabledComment="disabledComment"></Field>
                    </div>
                  </div>
                  <div>
                    <div class="steps-step-header mb-5">
                      <h4 class="mt-0">Дополнительные комментарии по автомобилю</h4>
                      <!-- <h6 class="mt-0 font-weight-bold text-primary">Осмотр подкапотного пространства сверху на остывшем двигателе</h6> -->
                      <div class="form-group">
                          <label for="comment-for-entry">Комментарий</label>
                          <html-textarea :disabled="disabledAddComments" id="comment-for-entry" @input="e => updateEntryField('comment', e)" :value="entry.comment"></html-textarea>
                          <Attachment 
                            v-if="!loading"
                            @file-uploaded="(e)=>{uploadMediaEntry('extra_media', e)}" 
                            @file-removed="(e)=>{removeMediaEntry('extra_media', e)}" 
                            component="pictures" 
                            :maxFiles="10"
                            route="/api/v1/service_forms/form_media/extra" 
                            collectionName="extra" 
                            :media="entry.extra_media"
                            :disabled="disabledAddComments"
                          />
                          <!-- <textarea :disabled="disabledAddComments" @input="e => updateEntryField('comment', e.target.value)" class="form-control" id="comment-for-entry" rows="3">{{ entry.comment }}</textarea> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="steps-step py-4" id="step-3" v-if="step == 3 || type == 'show'"  style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header mb-5">
                    <h4 class="mt-0 mb-1">Техническая диагностика (3/{{ steps }})</h4>
                    <h6 class="mt-0 font-weight-bold text-primary">Осмотр подкапотного пространства сверху</h6>

                  </div>
                  <div v-for="(field, index) in fields" v-if="field.section == 3.2">
                    <div class="d-flex">
                      <div 
                        class="d-flex align-items-center justify-content-center text-center "
                        :style="{
                          background: field.value == null ? 'red' : '#4ba82e',
                          color: '#fff',
                          // border: '2px solid white',
                          borderRadius: '50%',
                          width: '30px',
                          height: '30px',
                          flex: '0 0 30px',
                          marginTop: '10px',
                          marginRight: '10px'
                        }"
                      >
                        {{field.order}}
                      </div>
                      <Field 
                        @uploadMedia="uploadCustomFieldMedia" 
                        @removeMedia="removeCustomFieldMedia" 
                        @updateField="updateCustomField" 
                        @updateComment="updateCustomFieldComment" 
                        class="mb-4 w-100" 
                        :field="field" 
                        :entry="entry"
                        :disabled="disabledDiagnostic"
                        :disabledComment="disabledComment"></Field>
                    </div>
                  </div>
                  <div>
                    <div class="steps-step-header mb-5">
                      <h4 class="mt-0">Дополнительные комментарии по автомобилю</h4>
                      <!-- <h6 class="mt-0 font-weight-bold text-primary">Осмотр подкапотного пространства сверху на остывшем двигателе</h6> -->
                      <div class="form-group">
                          <label for="comment-for-entry">Комментарий</label>
                          <html-textarea :disabled="disabledAddComments" id="comment-for-entry" @input="e => updateEntryField('comment', e)" :value="entry.comment"></html-textarea>
                          <!-- <textarea :disabled="disabledAddComments" @input="e => updateEntryField('comment', e.target.value)" class="form-control" id="comment-for-entry" rows="3">{{ entry.comment }}</textarea> -->
                          <Attachment 
                            v-if="!loading"
                            @file-uploaded="(e)=>{uploadMediaEntry('extra_media', e)}" 
                            @file-removed="(e)=>{removeMediaEntry('extra_media', e)}" 
                            component="pictures" 
                            :maxFiles="10"
                            route="/api/v1/service_forms/form_media/extra" 
                            collectionName="extra" 
                            :media="entry.extra_media"
                            :disabled="disabledAddComments"
                          />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="steps-step py-4" id="step-4" v-if="step == 4 || type == 'show'"  style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header mb-5">
                    <h4 class="mt-0 mb-1">Техническая диагностика (4/{{ steps }})</h4>
                    <h6 class="mt-0 font-weight-bold text-primary">Осмотр автомобиля, поднятого на среднюю высоту</h6>

                  </div>
                  <div v-for="(field, index) in fields" v-if="field.section == 3.3">
                    <div class="d-flex">
                      <div 
                        class="d-flex align-items-center justify-content-center text-center "
                        :style="{
                          background: field.value == null ? 'red' : '#4ba82e',
                          color: '#fff',
                          // border: '2px solid white',
                          borderRadius: '50%',
                          width: '30px',
                          height: '30px',
                          flex: '0 0 30px',
                          marginTop: '10px',
                          marginRight: '10px'
                        }"
                      >
                        {{field.order}}
                        <!-- {{ index+1 }} -->
                      </div>
                      <Field 
                        @uploadMedia="uploadCustomFieldMedia" 
                        @removeMedia="removeCustomFieldMedia" 
                        @updateField="updateCustomField" 
                        @updateComment="updateCustomFieldComment" 
                        class="mb-4 w-100" 
                        :field="field" 
                        :entry="entry"
                        :disabled="disabledDiagnostic"
                        :disabledComment="disabledComment"></Field>
                    </div>
                  </div>
                  <div>
                    <div class="steps-step-header mb-5">
                      <h4 class="mt-0">Дополнительные комментарии по автомобилю</h4>
                      <!-- <h6 class="mt-0 font-weight-bold text-primary">Осмотр подкапотного пространства сверху на остывшем двигателе</h6> -->
                      <div class="form-group">
                          <label for="comment-for-entry">Комментарий</label>
                          <html-textarea :disabled="disabledAddComments" id="comment-for-entry" @input="e => updateEntryField('comment', e)" :value="entry.comment"></html-textarea>
                          <Attachment 
                            v-if="!loading"
                            @file-uploaded="(e)=>{uploadMediaEntry('extra_media', e)}" 
                            @file-removed="(e)=>{removeMediaEntry('extra_media', e)}" 
                            component="pictures" 
                            :maxFiles="10"
                            route="/api/v1/service_forms/form_media/extra" 
                            collectionName="extra" 
                            :media="entry.extra_media"
                            :disabled="disabledAddComments"
                          />
                        </div>
                    </div>
                  </div>
                </div>
                <div class="steps-step py-4" id="step-5" v-if="step == 5 || type == 'show'"  style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header mb-5">
                    <h4 class="mt-0 mb-1">Техническая диагностика (5/{{ steps }})</h4>
                    <h6 class="mt-0 font-weight-bold text-primary">Осмотр снизу автомобиля со снятой защитой двигателя</h6>

                  </div>
                  <div v-for="(field, index) in fields" v-if="field.section == 3.4">
                    <div class="d-flex">
                      <div 
                        class="d-flex align-items-center justify-content-center text-center "
                        :style="{
                          background: field.value == null ? 'red' : '#4ba82e',
                          color: '#fff',
                          // border: '2px solid white',
                          borderRadius: '50%',
                          width: '30px',
                          height: '30px',
                          flex: '0 0 30px',
                          marginTop: '10px',
                          marginRight: '10px'
                        }"
                      >
                      {{field.order}}
                      </div>
                      <Field 
                        @uploadMedia="uploadCustomFieldMedia" 
                        @removeMedia="removeCustomFieldMedia" 
                        @updateField="updateCustomField" 
                        @updateComment="updateCustomFieldComment" 
                        class="mb-4 w-100" 
                        :field="field" 
                        :entry="entry"
                        :disabled="disabledDiagnostic"
                        :disabledComment="disabledComment"></Field>
                    </div>
                  </div>
                  <div>
                    <div class="steps-step-header mb-5">
                      <h4 class="mt-0">Дополнительные комментарии по автомобилю</h4>
                      <!-- <h6 class="mt-0 font-weight-bold text-primary">Осмотр подкапотного пространства сверху на остывшем двигателе</h6> -->
                      <div class="form-group">
                          <label for="comment-for-entry">Комментарий</label>
                          <html-textarea :disabled="disabledAddComments" id="comment-for-entry" @input="e => updateEntryField('comment', e)" :value="entry.comment"></html-textarea>
                          <Attachment 
                            v-if="!loading"
                            @file-uploaded="(e)=>{uploadMediaEntry('extra_media', e)}" 
                            @file-removed="(e)=>{removeMediaEntry('extra_media', e)}" 
                            component="pictures" 
                            :maxFiles="10"
                            route="/api/v1/service_forms/form_media/extra" 
                            collectionName="extra" 
                            :media="entry.extra_media"
                            :disabled="disabledAddComments"
                          />
                        </div>
                    </div>
                  </div>
                </div>
                <div class="steps-step py-4" id="step-6" v-if="step == 6 || type == 'show'"  style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header">
                    <h4 class="mt-0 mb-5">Визуальный осмотр (6/{{ steps }})</h4>
                  </div>
                  <div class="text-center mb-4">
                    <button class="btn btn-outline-primary" v-if="lkpImage == null" @click="loadLkp" type="button">Запросить ЛКП</button>  
                    <div class="text-center my-2" v-if="lkpImage != null">
                      <img :src="'data:image/svg+xml;base64,'+lkpImage" class="img-fluid" style="max-width: 600px;;">
                    </div>
                    <button v-if="lkpImage != null" class="btn btn-outline-primary" @click="loadLkp" type="button">Обновить ЛКП</button>  

                  </div>
                </div>

                <div class="steps-step py-4" id="step-7" v-if="step == 7 || type == 'show'"  style="max-width: 850px; margin: 0 auto;">
                  <div class="steps-step-header">
                    <h4 class="mt-0 mb-5">Рекомендации (7/{{ steps }})</h4>
                  </div>
                
                  <div class="form-group">
                          <label for="comment-for-entry">Рекомендации</label>
                          <html-textarea :disabled="disabledRecommendation" id="recommendation-for-entry" @input="e => updateEntryField('recommendation', e)" :value="entry.recommendation"></html-textarea>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card-footer flex-column flex-md-row" v-if="type != 'show'">
              <button type="button" class="btn btn-outline-secondary" @click="previousStep" :disabled="step == 1">
                <i class="material-icons">arrow_back</i>
                Предыдущий шаг
              </button>
              <button type="button" class="btn btn-primary" v-if="step != steps" @click="nextStep">
                 Следующий шаг
                 <i class="material-icons">arrow_forward</i>
              </button>
             
              <vue-button-spinner
                v-if="showSaveButton "
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
import Field from '@components/Field'
import Attachment from '@components/Attachments/Attachment'

export default {
  data() {
    return {
      step: 1,
      status: '',
      activeField: '',
      type: null,
    }
  },
  components:{
    Field,
    Attachment
  },
  watch: {
    '$route.params.id': {
      immediate: true,
      handler() {
        this.mountedFunction();
      }
    }
  },
  computed: {
    ...mapGetters('ServiceSingle', ['entry', 'loading', 'lists', 'fields', 'fieldsEmpty', 'lkpImage']),
    models(){
      if(this.entry.brand == null){
        return [];
      }
      return this.lists.car_models.filter(car_model => car_model.brand_id === this.entry.brand.id);
    },
    steps(){
      if(this.$can('service_edit_manager') || this.$can('service_edit_published')){
        return 7;
      }
      return 6;
    },
    // showExtraSection() {
    //   let field69 = this.fields.find(field => field.id === 69);
    //   let field70 = this.fields.find(field => field.id === 70);
    //   return ((field69 && field69.value && field69.value.id === 1) || (field70 && field70.value && field70.value.id === 1));
    // },
    showSaveButton(){
      if(this.entry.status == 'published' ||  this.entry.status == 'diagnostic'){
        if (this.step == this.steps){
          return (this.$can('service_edit_published') || this.$can('service_edit_manager')); 
        }
        return false
      }
      if(!this.$can('service_edit_diagnostic')){
        return true;
      } else if (this.step == this.steps){
        return true && this.$can('service_edit');
      }
      return false;
    },
    
    disabledBasic() {
      if(this.type === 'show'){
        return true;
      }
      const canEditBasic = this.$can('service_edit_basic') && this.entry.status !== 'published' && this.entry.status !== 'diagnostic';
      const canEditPublished = this.$can('service_edit_published');

      return !(canEditBasic || canEditPublished);
    },

    disabledComment(){
      return !(this.$can('service_edit_diagnostic') || this.$can('service_edit_published') || this.$can('service_edit_manager'));
    },

    disabledAddComments(){
      return !(this.$can('service_edit_diagnostic') || this.$can('service_edit_published'));
    },

    disabledDiagnostic() {
      if(this.type === 'show'){
        return true;
      }
      const canEditDiagnostic = this.$can('service_edit_diagnostic') && this.entry.status !== 'published' && this.entry.status !== 'diagnostic';
      const canEditPublished = this.$can('service_edit_published');

      return !(canEditDiagnostic  || canEditPublished);
    },
    disabledRecommendation() {
      if(this.type === 'show'){
        return true;
      }
      const canEditManager = this.$can('service_edit_manager');
      const canEditPublished = this.$can('service_edit_published');

      return !(canEditManager  || canEditPublished);
    },
  },
  mounted() {
    // this.fetchCreateData()
    this.mountedFunction();
  },
  beforeDestroy() {
    this.resetState()
  },
  methods: {
    ...mapActions('ServiceSingle', [
      'storeData',
      'resetState',
      'setData',
      'setField',
      'setCustomField',
      'fetchCreateData',
      'fetchEditData',
      'uploadMediaToField',
      'removeMediaFromField',
      'uploadMedia',
      'removeMedia',
      'setCustomFieldComment',
      'fetchLKPData',
    ]),
    uploadMediaEntry(name, media){
      this.uploadMedia({name, media})
    },
    removeMediaEntry(name, media){
      this.removeMedia({name, media})
    },
    loadLkp(){
      this.fetchLKPData();
    },
    mountedFunction(){
      this.resetState()
        
      if (this.$route.name === 'service.create') {
        this.type = 'create'
        this.fetchCreateData()
      } else if (this.$route.name === 'service.show') {
        this.fetchEditData(this.$route.params.id)
        this.type = 'show'
      } else if (this.$route.name === 'service.edit') {
        this.fetchEditData(this.$route.params.id)
        this.type = 'edit'
      }
    },
    updateEntryField(field, value){
      // console.log(field);
      this.setField({field, value});
    },
    updateCustomField(fieldId, value){
      this.setCustomField({fieldId, value});
    },
    updateCustomFieldComment(fieldId, value){
      this.setCustomFieldComment({fieldId, value});
    },
    uploadCustomFieldMedia(fieldId, media){
      this.uploadMediaToField({fieldId, media})
    },
    removeCustomFieldMedia(fieldId, media){
      this.removeMediaFromField({fieldId, media})
    },
    previousStep(){
      if(this.step-1 > 0){
        this.step = this.step-1
        window.scrollTo(0, 0);
      }
      this.changeStep();
    },
    nextStep(){
      if(this.step+1 <= this.steps){
        this.step = this.step+1
        window.scrollTo(0, 0);
      }
      this.changeStep();
    },

    changeStep(){
      if(this.entry.status != 'published' && this.entry.status != 'diagnostic'){
        this.storeData('draft');
      }
    },
    submitForm() {
      this.storeData('published')
        .then(() => {
          this.$router.push({ name: 'service.index' })
          this.$eventHub.$emit('create-success')
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
<style>
/* .vs__selected{
  background: #fff;
  color: #000;
} */
.vs--disabled .vs__selected{
  color: #000;

}
.btn .badge {
position: absolute;
top: -10px;
z-index: 99;
}
#recommendation-for-entry{
  min-height: 150px;
}

div.customTextarea{
  min-height: 100px;
  padding-bottom: 10px;
  background: no-repeat center bottom, center calc(100% - 1px);
  background-size: 0 100%, 100% 100%;
  background-image: linear-gradient(to top, #4ba82e 2px, rgba(75, 168, 46, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
}
</style>