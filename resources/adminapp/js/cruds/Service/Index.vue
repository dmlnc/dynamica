<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary card-header-icon">
            <div class="card-icon">
              <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">
              {{ $t('global.table') }}
              <strong>{{ $t('cruds.service.title') }}</strong>
            </h4>
          </div>
          <div class="card-body">
            <router-link
              class="btn btn-primary"
              v-if="$can(xprops.permission_prefix + 'edit')"
              :to="{ name: xprops.route + '.create' }"
            >
              <i class="material-icons">
                add
              </i>
              {{ $t('global.add') }}
            </router-link>
            <button
              type="button"
              class="btn btn-default"
              @click="fetchIndexData"
              :disabled="loading"
              :class="{ disabled: loading }"
            >
              <i class="material-icons" :class="{ 'fa-spin': loading }">
                refresh
              </i>
              {{ $t('global.refresh') }}
            </button>
          </div>

          <div class="card-body">
            <div class=" px-3 py-2 border rounded mb-4">
              <h5 class="mt-2 mb-3">Фильтр</h5>
                <div class="row">
                  <div class="col-md-3">
                    <div
                      class="form-group bmd-form-group"
                    >
                      <label class="">Марка</label>
                      <v-select
                        name="brand"
                        label="name"
                        :key="'brand-field'"
                        :value="filterData.brand"
                        :options="filter.brands"
                        :closeOnSelect="true"
                        :clearable="false"
                        @input="(e)=>{setFilter('brand', e ,true); setFilter('car_model',null ,true);}"
                        :searchable="false"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="form-group bmd-form-group"
                    >
                      <label class="">Модель</label>
                      <v-select
                        name="model"
                        label="name"
                        :key="'model-field'"
                        :value="filterData.car_model"
                        :options="models"
                        :closeOnSelect="true"
                        :clearable="false"
                        @input="(e)=>{setFilter('car_model',e ,true);}"
                        :searchable="false"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="form-group bmd-form-group"
                    >
                      <label class="">Диагност</label>
                      <v-select
                        name="diagnost"
                        label="name"
                        :key="'diagnost-field'"
                        :value="filterData.diagnost"
                        :options="filter.diagnosts"
                        :closeOnSelect="true"
                        :clearable="false"
                        @input="(e)=>{setFilter('diagnost',e ,true);}"
                        :searchable="false"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="form-group bmd-form-group"
                    >
                      <label class="">Статус</label>
                      <v-select
                        name="status"
                        label="name"
                        :key="'status-field'"
                        :value="filterData.status"
                        :options="statusesOptions"
                        :closeOnSelect="true"
                        :clearable="false"
                        @input="(e)=>{setFilter('status', e , true);}"
                        :searchable="false"
                      />
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div
                      class="form-group bmd-form-group "
                    >
                      <label class="">VIN</label>
                      <input
                        class="form-control"
                        type="text"
                        :value="query.vin"
                        @input="(e)=>{setFilter('vin',e.target.value ,false);}"
                      />
                    </div>
                  </div>
                </div>
            </div>
                  
          </div>
          <div class="card-body">
            <div class="mb-3">
              <span class="badge badge-pill badge-primary">Всего: {{total}}</span>
              <span v-if="filterData.vin != null && filterData.vin != ''" class="badge badge-pill badge-outline-secondary">VIN: <b>{{filterData.vin}}</b> <span class="cursor-pointer pill-close" @click="(e)=>{setFilter('vin', null, false)}">+</span></span>
              <span v-if="filterData.brand != null" class="badge badge-pill badge-outline-secondary">{{filterData.brand.name}} <span class="cursor-pointer pill-close" @click="(e)=>{setFilter('brand', null, true); setFilter('car_model', null, true)}">+</span></span>
              <span v-if="filterData.car_model != null" class="badge badge-pill badge-outline-secondary">{{filterData.car_model.name}} <span class="cursor-pointer pill-close" @click="(e)=>{setFilter('car_model', null, true)}">+</span></span>
              <span v-if="filterData.diagnost != null" class="badge badge-pill badge-outline-secondary">{{filterData.diagnost.name}} <span class="cursor-pointer pill-close" @click="(e)=>{setFilter('diagnost', null, true)}">+</span></span>
              <span v-if="filterData.status != null" class="badge badge-pill badge-outline-secondary">{{filterData.status.name}} <span class="cursor-pointer pill-close" @click="(e)=>{setFilter('status', null, true)}">+</span></span>

            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="table-overlay" v-show="loading">
                  <div class="table-overlay-container">
                    <material-spinner></material-spinner>
                    <span>Загрузка...</span>
                  </div>
                </div>
                <datatable
                  class="service-datatable"
                  :columns="columns"
                  :data="data"
                  :total="total"
                  :query="query"
                  :xprops="xprops"
                  :HeaderSettings="false"
                  :pageSizeOptions="[10, 25, 50, 100]"
                >
                  <!-- <global-search :query="query" class="pull-left" /> -->
                  <!-- <header-settings :columns="columns" class="pull-right" /> -->
                </datatable>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'
import DatatableActions from '@components/Datatables/Service/DatatableActions'
// import HeaderSettings from '@components/Datatables/HeaderSettings'
// import GlobalSearch from '@components/Datatables/GlobalSearch'
// import DatatableList from '@components/Datatables/DatatableList'
import DatatableBrand from '@components/Datatables/Service/DatatableBrand'
import DatatableColor from '@components/Datatables/Service/DatatableColor'
import DatatableDate from '@components/Datatables/Service/DatatableDate'


export default {
  components: {
    // GlobalSearch,
    // HeaderSettings
  },
  data() {
    return {
      columns: [
        {
          title: 'Авто',
          field: 'brand',
          tdComp: DatatableBrand,
          sortable: false
        },
        {
          title: 'Цвет',
          field: 'color',
          tdComp: DatatableColor,
          sortable: false
        },
        {
          title: 'Vin',
          field: 'vin',
          // thComp: TranslatedHeader,
          sortable: false
        },
        {
          title: 'Дата',
          field: 'date',
          tdComp: DatatableDate,
          sortable: false
        },
        {
          title: 'Действия',
          tdComp: DatatableActions,
          visible: true,
          thClass: 'text-right',
          tdClass: 'text-right td-actions',
          colStyle: 'width: 150px;'
        }
      ],
      filterData: {
        brand: null, 
        car_model: null,
        status: null,
        diagnost: null,
        vin:  null,
      },
      statusesOptions: [
        {
          id: 'draft',
          name: 'Черновик'
        },
        {
          id: 'not finished',
          name: 'Не заполнено'
        },
        {
          id: 'diagnostic',
          name: 'Тех. диагностика'
        },{
          id: 'published',
          name: 'Опубликовано'
        },
      ],
      query: { 
        // sort: 'id', 
        // order: 'desc', 
        limit: 100, 
        // s: '', 
        brand_id: null, 
        car_model_id: null,
        status_id: null,
        diagnost_id: null,
        vin:  null,
      },
      xprops: {
        module: 'ServiceIndex',
        route: 'service',
        permission_prefix: 'service_'
      }
    }
  },
  beforeDestroy() {
    this.resetState()
  },
  computed: {
    ...mapGetters('ServiceIndex', ['data', 'total', 'loading', 'filter']),
    models(){
      if(this.filterData.brand == null){
        return [];
      }
      return this.filter.car_models.filter(car_model => car_model.brand_id === this.filterData.brand.id);
    },
  },
  watch: {
    query: {
      handler(query) {
        this.setQuery(query)
        this.fetchIndexData()
      },
      deep: true
    }
  },
  mounted(){
    this.fetchFilterData();
  },
  methods: {
    ...mapActions('ServiceIndex', ['fetchIndexData', 'setQuery', 'resetState', 'fetchFilterData']),

    setFilter(field, data, setId = false){
      
      console.log(data);
      this.filterData[field] = data;
      if(setId){
        if(data!= null){
          this.query[field+'_id'] = data.id;
        } else{
          this.query[field+'_id'] = data;
        }
      } else{
        this.query[field] = data;
      }
    },
  }
}
</script>
<style>

@media (max-width: 450px){
  .service-datatable tr{
    display: flex;
    flex-direction: column;
    padding-top: 10px;
    padding-bottom: 10px;
    width: 100%;
    border-bottom: 1px solid rgba(0, 0, 0, 0.06);;
  }
  .service-datatable th{
    display: none;
  }
  .service-datatable tr td{
    border-top: none;
    padding: 3px 8px!important;
  }
}

.cursor-pointer {
    cursor: pointer;
}

.badge {
    font-size: 14px;
    text-transform: none;
}

.badge b {
    font-weight: 500;
}

.badge-outline-secondary {
    color: #000;
    font-weight: 400;
    border: 1px solid #6c757d;
}

.pill-close {
    transform: rotate(45deg) translate(4px, 0px);
    display: inline-block;
    font-size: 18px;
    font-weight: 800;
    line-height: 0;
    color: red;
}
</style>
