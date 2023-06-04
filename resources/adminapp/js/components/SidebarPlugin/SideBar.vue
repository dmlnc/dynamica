<template>
  <div
    class="sidebar"
    :data-color="itemColor"
  >
    <div class="logo pb-0">

      <a href="/" class="simple-text logo-normal">
        <img src="https://dynamica-trade.ru/uploads/media/default/0001/01/4b7d3e795ee87604377087e95abff7a150d7ec7d.png" class="img-fluid" alt="" style="max-width: 180px;">
      </a>
      <div class="form-group px-3 pb-0 text-center">
          <select class="form-control text-center" v-if="company?.id" v-model="company_id" @change="onChange($event)">
              <option v-for="item in list" :value="item.id"  :selected="item.id === company.id">{{ item.name }}</option>
          </select>
      </div>

      <!-- {{ list }} -->

      <!-- {{ company.id }} -->
    </div>
    <div class="sidebar-wrapper">
      <slot name="content"></slot>
      <ul class="nav">
        <slot>
          <template v-for="(item, i) in sidebarLinks">
            <sidebar-item-group
              v-if="item.children && $can(item.gate)"
              :key="`group-${i}`"
              :item="item"
            >
            </sidebar-item-group>

            <sidebar-link v-else :key="`item-${i}`" :item="item"></sidebar-link>
          </template>
        </slot>
      </ul>

      <ul class="nav">
        <li class="nav-item">
          <a href="#" class="nav-link" @click.prevent="logout">
            <i class="material-icons">power_settings_new</i>
            <p>{{ $t('global.logout') }}</p>
          </a>
        </li>
      </ul>
    </div>
    <!-- <div class="sidebar-background" :style="sidebarStyle"></div> -->
  </div>
</template>

<script>
import { mapGetters, mapActions } from 'vuex'


export default {
  props: {
    title: {
      type: String,
      default: 'panel.site_title'
    },
    backgroundImage: {
      type: String,
      default: '/md/img/sidebar-1.jpg'
    },
    imgLogo: {
      type: String,
      default: ''
    },
    backgroundColor: {
      type: String,
      default: 'black',
      validator: value => {
        let acceptedValues = ['', 'white', 'black']
        return acceptedValues.indexOf(value) !== -1
      }
    },
    itemColor: {
      type: String,
      default: 'purple',
      validator: value => {
        let acceptedValues = [
          '',
          'purple',
          'azure',
          'green',
          'orange',
          'rose',
          'danger'
        ]
        return acceptedValues.indexOf(value) !== -1
      }
    },
    sidebarLinks: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      company_id: this.company?.id
    }
  },
  watch: {
    company(newValue, oldValue) {
      this.company_id = newValue.id;
    },
  },
  computed: {
    ...mapGetters('CompaniesList', ['company', 'list']),
    sidebarStyle() {
      return {
        backgroundImage: `url(${this.backgroundImage})`
      }
    }
  },
  methods: {
    ...mapActions('CompaniesList', ['setCompany']),
    onChange(event) {
      console.log(event);
        const selectedId = event.target.value;
        const selectedItem = this.list.find(item => item.id == selectedId);
        console.log(selectedItem);
        if (selectedItem) {
            this.setCompany({id: selectedItem.id, name: selectedItem.name});
            setTimeout(() => {
              window.location.reload();
            }, 200);
        }
    },

    logout() {
      axios
        .request({ baseURL: '/', url: 'logout', method: 'post' })
        .then(() => location.assign('/'))
    }
  }
}
</script>

<style>
@media screen and (min-width: 991px) {
  .nav-mobile-menu {
    display: none;
  }
}
</style>
