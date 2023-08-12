import Vue from 'vue'
import Vuex from 'vuex'

import Alert from './modules/alert'
import I18NStore from './modules/i18n'

import PermissionsIndex from './cruds/Permissions'
import PermissionsSingle from './cruds/Permissions/single'
import RolesIndex from './cruds/Roles'
import RolesSingle from './cruds/Roles/single'
import UsersIndex from './cruds/Users'
import UsersSingle from './cruds/Users/single'
import UsersProfile from './cruds/Users/profile'
import CompaniesIndex from './cruds/Companies'
import CompaniesList from './cruds/Companies/list'
import CompaniesSingle from './cruds/Companies/single'
import Settings from './cruds/Settings'
import ServiceIndex from './cruds/Service'
import ServiceSingle from './cruds/Service/single'
Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
  modules: {
    Alert,
    I18NStore,
    PermissionsIndex,
    PermissionsSingle,
    RolesIndex,
    RolesSingle,
    UsersIndex,
    UsersSingle,
    UsersProfile,
    CompaniesIndex,
    CompaniesSingle,
    CompaniesList,
    ServiceIndex,
    ServiceSingle,
    Settings
  },
  strict: debug
})
