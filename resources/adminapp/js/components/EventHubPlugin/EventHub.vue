<template>
  <div></div>
</template>

<script>

import { mapActions } from 'vuex'

export default {
  data() {
    return {
      notificationSettings: {
        type: 'success',
        delay: 2000,
        placement: {
          from: 'top',
          align: 'center'
        }
      }
    }
  },
  created() {
    this.$eventHub.$on('create-success', this.itemCreated)
    this.$eventHub.$on('update-success', this.itemUpdated)
    this.$eventHub.$on('delete-success', this.itemDeleted)
  },
  methods: {
    ...mapActions('CompaniesList', ['setCompany']),
    itemCreated() {
      this.$jquery.notify(
        {
          icon: 'check',
          message: this.$i18n.t('global.create_success')
        },
        this.notificationSettings
      )
    },
    itemUpdated() {
      this.$jquery.notify(
        {
          icon: 'check',
          message: this.$i18n.t('global.update_success')
        },
        { ...this.notificationSettings, type: 'primary' }
      )
    },
    itemDeleted() {
      this.$jquery.notify(
        {
          icon: 'check',
          message: this.$i18n.t('global.delete_success')
        },
        { ...this.notificationSettings, type: 'warning' }
      )
    }
  },
  watch: {
    $route: {
      handler() {
        axios.get('abilities').then(response => {
          this.$ability.update([
            { subject: 'all', actions: response.data.data },
            { subject: 'company', actions: response.data.meta.company.abilities }
          ])
          let companyData = {
            id: response.data.meta.company.id,
            name: response.data.meta.company.name,
          };
          this.setCompany(companyData);
        })
      },
      immediate: true
    }
  }
}
</script>
