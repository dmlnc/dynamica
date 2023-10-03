/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')
window.moment.updateLocale('en', { week: { dow: 1 } })

Vue.config.productionTip = false
Vue.prototype.$jquery = $

import App from './App.vue'

// Core
import router from './routes/routes'
import store from './store/store'
import i18n from './i18n'

// Plugins

import GlobalComponents from './globalComponents'
import GlobalDirectives from './globalDirectives'
import GlobalMixins from './mixins/global'
import { mapGetters, mapActions } from 'vuex'

Vue.use(GlobalComponents)
Vue.use(GlobalDirectives)
Vue.use(GlobalMixins)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('html-textarea',{
  template:'<div class="customTextarea" :contenteditable="!disabled" :id="id" @input="updateHTML"></div>',
  props:['value', 'id', 'disabled'],
  mounted: function () {
    this.$el.innerHTML = this.value;
  },
  methods: {
    updateHTML: function(e) {
      this.$emit('input', e.target.innerHTML);
    }
  }
});

const app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
  store,
  i18n,
  created() {
    this.fetchLanguages()
    this.fetchListData()
  },
  methods: {
    ...mapActions('I18NStore', ['fetchLanguages']),
    ...mapActions('CompaniesList', ['fetchListData'])
  }
})
