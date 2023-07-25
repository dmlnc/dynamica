<template>
    <div>
        <div class="car-block">
            <div class="car-block-icon" >
                <img :src="row[field].image" class="img-fluid" alt="">
            </div>
            <div class="car-block-content">
                <p class="car-block-content-header">
                    {{row[field].name}} {{row[field].model}}
                </p>
                <p class="car-block-content-footer">
                    <span v-if="row[field].status == 'draft'" class="text-secondary">Черновик</span>
                    <span v-if="row[field].status == 'published'" class="text-success">Опубликовано</span>
                    <span v-if="row[field].status == 'diagnostic'" class="text-warning">Тех. диагностика</span>
                    <span v-if="row[field].status == 'not finished'" class="text-danger">Не заполнено</span>
                    <span class="divider">&nbsp;·&nbsp;</span>
                    <span v-if="row[field].diagnost!=null">{{row[field].diagnost.name}}</span>
                </p>
            </div>
        </div>
    </div>
  </template>
  
  <script>
  export default {
    props: ['field', 'row'],
    computed: {
    //   entry() {
    //     let s = _.split(this.field, '.')
    //     return {
    //       key: s[0],
    //       field: s[1]
    //     }
    //   }
    }
  }
  </script>

<style scoped>
    .car-block {
        min-height: 40px;
        display: flex;
        align-items: center;
        height: 100%;
        padding-right: 10px;
    }

    .car-block-icon {
        flex: 0 0 40px;
        height: 40px;
        border-radius: 50%;
        flex-shrink: 0;
        background: #fff;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .05);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 5px;
        margin-right: 10px;
    }

    .car-block-content-header,
    .car-block-content-footer {
        margin-bottom: 0;
        line-height: 1.3;
        font-size: 12px;
        white-space: nowrap;
    }

    .car-block-content-header {
        font-weight: 500;

    }

    .car-block-content-footer {
        font-size: 10px;
        color: #7b7979;
        margin-top: 5px;
    }


</style>
  
  