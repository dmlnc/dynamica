<template>
    <div class="dt-action-container d-flex">
        <a
        :href="`/service-forms/client/${row.id}`"
        target="_blank"
        class="btn btn-just-icon btn-round btn-link text-green"
        v-if="$can(xprops.permission_prefix + 'print_client') "
        type="button"
      >
        <i class="material-icons">print</i>
      </a>
      <a
        :href="`/service-forms/service/${row.id}`"
        target="_blank"
        class="btn btn-just-icon btn-round btn-link text-yellow"
        v-if="$can(xprops.permission_prefix + 'print_full')"
        type="button"
      >
        <i class="material-icons">assignment</i>
      </a>
      <router-link
        v-if="$can(xprops.permission_prefix + 'show')"
        :to="{ name: xprops.route + '.show', params: { id: row.id } }"
        class="btn btn-just-icon btn-round btn-link text-azure"
      >
        <i class="material-icons">remove_red_eye</i>
      </router-link>
  
      <router-link
        class="btn btn-just-icon btn-round btn-link text-success"
        v-if="allowEdit"
        :to="{ name: xprops.route + '.edit', params: { id: row.id } }"
      >
        <i class="material-icons">edit</i>
      </router-link>
  
      <a
        href="#"
        class="btn btn-just-icon btn-round btn-link text-rose"
        v-if="$can(xprops.permission_prefix + 'delete')"
        @click.prevent="destroyData(row.id)"
        type="button"
      >
        <i class="material-icons">delete</i>
      </a>

      
    </div>
  </template>
  
  <script>
  export default {
    props: ['row', 'xprops'],
    data() {
      return {
        // Code...
      }
    },
    computed: {
        allowEdit() {
            const canEditBasic = this.$can('service_edit') && this.row.brand.status !== 'published' && this.row.brand.status !== 'diagnostic';
            const canEditPublished = this.$can('service_edit_published');
            return (canEditBasic || canEditPublished);
        },

        canPrintClient(){
          if(this.row.brand.status !== 'published' && this.row.brand.status !== 'diagnostic'){
            return this.$can('service_print_client_draft');
          }
          return this.$can('service_print_client');
        },
        canPrintService(){
          if(this.row.brand.status !== 'published' && this.row.brand.status !== 'diagnostic'){
            return this.$can('service_print_full_draft');
          }
          return this.$can('service_print_full');
        },
        canView(){
          if(this.row.brand.status !== 'published' && this.row.brand.status !== 'diagnostic'){
            return this.$can('service_show_draft');
          }
          return this.$can('service_show');
        },

    },
    created() {
      // Code...
    },
    methods: {
        print(id,type){
            this.$store
                .dispatch(this.xprops.module + '/print', {id, type})
        },
        destroyData(id) {
            this.$swal({
            title: 'Удалить запись?',
            text: "Это действие нельзя будет отменить",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Удалить',
            confirmButtonColor: '#dd4b39',
            focusCancel: true,
            reverseButtons: true
            }).then(result => {
            if (result.value) {
                this.$store
                .dispatch(this.xprops.module + '/destroyData', id)
                .then(result => {
                    this.$eventHub.$emit('delete-success')
                })
            }
            })
        }
    }
  }
  </script>
  