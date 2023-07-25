import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const View = { template: '<router-view></router-view>' }

const routes = [
  {
    path: '/',
    component: () => import('@pages/Layout/DashboardLayout.vue'),
    redirect: 'dashboard',
    children: [
      {
        path: 'dashboard',
        name: 'dashboard',
        component: () => import('@pages/Dashboard.vue'),
        meta: { title: 'global.dashboard' }
      },
      {
        path: 'car-list',
        name: 'car_list',
        component: () => import('@pages/CarList.vue'),
        meta: { title: 'global.carList' }
      },
      {
        path: 'settings',
        name: 'settings',
        component: () => import('@cruds/Settings/Index.vue'),
        meta: { title: 'global.settings' }
      },
      {
        path: 'service',
        name: 'service.index',
        component: () => import('@cruds/Service/Index.vue'),
        meta: { title: 'cruds.service.title' }
      },
      {
        path: 'service/create',
        name: 'service.create',
        component: () => import('@cruds/Service/Single.vue'),
        meta: { title: 'cruds.service.title' }
      },
      {
        path: 'service/:id',
        name: 'service.show',
        component: () => import('@cruds/Service/Single.vue'),
        meta: { title: 'cruds.service.title' }
      },
      {
        path: 'service/:id/edit',
        name: 'service.edit',
        component: () => import('@cruds/Service/Single.vue'),
        meta: { title: 'cruds.service.title' }
      },
      
      {
        path: 'user-management',
        name: 'user_management',
        component: View,
        redirect: { name: 'permissions.index' },
        children: [
          {
            path: 'permissions',
            name: 'permissions.index',
            component: () => import('@cruds/Permissions/Index.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/create',
            name: 'permissions.create',
            component: () => import('@cruds/Permissions/Create.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id',
            name: 'permissions.show',
            component: () => import('@cruds/Permissions/Show.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'permissions/:id/edit',
            name: 'permissions.edit',
            component: () => import('@cruds/Permissions/Edit.vue'),
            meta: { title: 'cruds.permission.title' }
          },
          {
            path: 'roles',
            name: 'roles.index',
            component: () => import('@cruds/Roles/Index.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/create',
            name: 'roles.create',
            component: () => import('@cruds/Roles/Create.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id',
            name: 'roles.show',
            component: () => import('@cruds/Roles/Show.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'roles/:id/edit',
            name: 'roles.edit',
            component: () => import('@cruds/Roles/Edit.vue'),
            meta: { title: 'cruds.role.title' }
          },
          {
            path: 'users',
            name: 'users.index',
            component: () => import('@cruds/Users/Index.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/create',
            name: 'users.create',
            component: () => import('@cruds/Users/Create.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id',
            name: 'users.show',
            component: () => import('@cruds/Users/Show.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'users/:id/edit',
            name: 'users.edit',
            component: () => import('@cruds/Users/Edit.vue'),
            meta: { title: 'cruds.user.title' }
          },
          {
            path: 'companies',
            name: 'companies.index',
            component: () => import('@cruds/Companies/Index.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/create',
            name: 'companies.create',
            component: () => import('@cruds/Companies/Create.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/:id',
            name: 'companies.show',
            component: () => import('@cruds/Companies/Show.vue'),
            meta: { title: 'cruds.company.title' }
          },
          {
            path: 'companies/:id/edit',
            name: 'companies.edit',
            component: () => import('@cruds/Companies/Edit.vue'),
            meta: { title: 'cruds.company.title' }
          },
        ]
      }
    ]
  }
]

export default new VueRouter({
  mode: 'history',
  base: '/admin',
  routes
})
