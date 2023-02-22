<template>
    <div class="container-fluid">
        <div class="v-modal" v-if="showModal">
            <div class="v-modal-close" @click.prevent="closeModal">+</div>
            <div class="v-modal-body">
                <h3><b>Скачать QR-код</b></h3>
                <p>Выберите нужный формат листовки</p>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="select-btn" @click.prevent="pdfType=1" :class="{active: pdfType == 1}">
                            <svg width="71" height="70" viewBox="0 0 71 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M42.5 9.33398H19.5C16.7386 9.33398 14.5 11.5726 14.5 14.334V55.6673C14.5 58.4287 16.7386 60.6673 19.5 60.6673H51.5C54.2614 60.6673 56.5 58.4287 56.5 55.6673V23.334M42.5 9.33398L56.5 23.334M42.5 9.33398V18.334C42.5 21.0954 44.7386 23.334 47.5 23.334H56.5" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M44.6667 48.6667H44V48H44.6667V48.6667ZM44 53.3333H44.6667V54H44V53.3333ZM49.3333 53.3333H50V54H49.3333V53.3333ZM49.3333 48.6667V48H50V48.6667H49.3333ZM34 39C34 38.4477 34.4477 38 35 38H39C39.5523 38 40 38.4477 40 39V43C40 43.5523 39.5523 44 39 44H35C34.4477 44 34 43.5523 34 43V39ZM34 49C34 48.4477 34.4477 48 35 48H39C39.5523 48 40 48.4477 40 49V53C40 53.5523 39.5523 54 39 54H35C34.4477 54 34 53.5523 34 53V49ZM44 39C44 38.4477 44.4477 38 45 38H49C49.5523 38 50 38.4477 50 39V43C50 43.5523 49.5523 44 49 44H45C44.4477 44 44 43.5523 44 43V39ZM46.6667 50.6667H47.3333V51.3333H46.6667V50.6667Z" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                            <p>Книжный</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="select-btn" @click.prevent="pdfType=2" :class="{active: pdfType == 2}">
                            <svg _ width="71" height="70" viewBox="0 0 71 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M61.1665 42L61.1665 19C61.1665 16.2386 58.9279 14 56.1665 14L14.8332 14C12.0717 14 9.83317 16.2386 9.83317 19L9.83317 51C9.83317 53.7614 12.0717 56 14.8332 56L47.1665 56M61.1665 42L47.1665 56M61.1665 42L52.1665 42C49.4051 42 47.1665 44.2386 47.1665 47L47.1665 56" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M38.6667 30L38.6667 30.6667L38 30.6667L38 30L38.6667 30ZM41.3333 32.6667L41.3333 33.3333L40.6667 33.3333L40.6667 32.6667L41.3333 32.6667ZM38.6667 35.3333L38.6667 36L38 36L38 35.3333L38.6667 35.3333ZM44 30.6667L43.3333 30.6667L43.3333 30L44 30L44 30.6667ZM43.3333 35.3333L44 35.3333L44 36L43.3333 36L43.3333 35.3333ZM54 21L54 25C54 25.5523 53.5523 26 53 26L49 26C48.4477 26 48 25.5523 48 25L48 21C48 20.4477 48.4477 20 49 20L53 20C53.5523 20 54 20.4477 54 21ZM44 21L44 25C44 25.5523 43.5523 26 43 26L39 26C38.4477 26 38 25.5523 38 25L38 21C38 20.4477 38.4477 20 39 20L43 20C43.5523 20 44 20.4477 44 21ZM54 31L54 35C54 35.5523 53.5523 36 53 36L49 36C48.4477 36 48 35.5523 48 35L48 31C48 30.4477 48.4477 30 49 30L53 30C53.5523 30 54 30.4477 54 31Z" stroke="currentColor" stroke-width="2"></path>
                            </svg>
                            <p>Альбомный</p>
                        </div>
                    </div>
                </div>
                <a href="#" @click.prevent="getPdf" class="btn btn-primary w-100">Скачать</a>
            </div>
        </div>
        <div class="v-modal-bg" v-if="showModal" @click.prevent="closeModal"></div>
        <div class="card">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">language</i>
                </div>
                <h4 class="card-title">
                    {{ $t('global.dashboard') }}
                </h4>
            </div>
            <div class="card-body" style="min-height: 200px;">
                <div class="table-overlay" v-show="loading" style="margin-top: -0.9375rem">
                    <div class="table-overlay-container">
                        <material-spinner></material-spinner>
                        <span>Loading...</span>
                    </div>
                </div>
                <div class=" px-3 py-2 border rounded mb-4" v-if="this.meta">
                    <h5 class="mt-2 mb-3">Фильтр</h5>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Сортировка</label>
                                <select class="form-control" v-model="sortBy">
                                    <option value="none">Не выбрано</option>
                                    <option value="-year">Год по убыванию</option>
                                    <option value="year">Год по возрастанию</option>
                                    <option value="-run_original">Пробег по убыванию</option>
                                    <option value="run_original">Пробег по возрастанию</option>
                                    <option value="-price">Цена по убыванию</option>
                                    <option value="price">Цена по возрастанию</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Бренд</label>
                                <select class="form-control" v-model="filter.brand" @change="changeBrand">
                                    <option value="">Не выбрано</option>
                                    <option v-for="(brand, key) in meta.brands" :key="key" :value="key">{{key}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Модель</label>
                                <select :disabled="filter.brand == ''" class="form-control" v-model="filter.model">
                                    <option value="">Не выбрано</option>
                                    <option v-for="(model, index) in meta.brands[filter.brand]" :key="index" :value="model">{{model}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Цена</label>
                                <div class="d-flex justify-content-between">
                                    <span> {{$n(filter.price[0])}} ₽</span>
                                    <span> {{$n(filter.price[1])}} ₽</span>
                                </div>
                                <MultiRangeSlider baseClassName="multi-range-slider-bar-only" :min="initialFilter.price[0]" :max="initialFilter.price[1]" :step="100000" :ruler="false" :label="false" :minValue="filter.price[0]" :maxValue="filter.price[1]" @input="updatePriceFilter" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Пробег</label>
                                <div class="d-flex justify-content-between">
                                    <span> {{$n(filter.run[0])}} км.</span>
                                    <span> {{$n(filter.run[1])}} км.</span>
                                </div>
                                <MultiRangeSlider baseClassName="multi-range-slider-bar-only" :min="initialFilter.run[0]" :max="initialFilter.run[1]" :step="10000" :ruler="false" :label="false" :minValue="filter.run[0]" :maxValue="filter.run[1]" @input="updateRunFilter" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-6 mb-3">
                            <div class="form-group">
                                <label class="">Год</label>
                                <div class="d-flex justify-content-between">
                                    <span> {{$n(filter.year[0])}}</span>
                                    <span> {{$n(filter.year[1])}}</span>
                                </div>
                                <MultiRangeSlider baseClassName="multi-range-slider-bar-only" :min="initialFilter.year[0]" :max="initialFilter.year[1]" :step="1" :ruler="false" :label="false" :minValue="filter.year[0]" :maxValue="filter.year[1]" @input="updateYearFilter" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" v-if="data.length">
                    <div class="mb-3">
                        <span class="badge badge-pill badge-primary">Всего: {{filteredCars.length}}</span>
                        <span v-if="filter.brand != ''" class="badge badge-pill badge-outline-secondary">{{filter.brand}} <span class="cursor-pointer pill-close" @click="filter.brand = ''; filter.model = '';">+</span></span>
                        <span v-if="filter.model != ''" class="badge badge-pill badge-outline-secondary">{{filter.model}} <span class="cursor-pointer pill-close" @click="filter.model = '';">+</span></span>
                        <span v-if="filter.price[0] != initialFilter.price[0]" class="badge badge-pill badge-outline-secondary">от <b>{{$n(filter.price[0])}}</b> ₽</span>
                        <span v-if="filter.price[1] != initialFilter.price[1]" class="badge badge-pill badge-outline-secondary">до <b>{{$n(filter.price[1])}}</b> ₽</span>
                        <span v-if="filter.run[0] != initialFilter.run[0]" class="badge badge-pill badge-outline-secondary">от <b>{{$n(filter.run[0])}}</b> км.</span>
                        <span v-if="filter.run[1] != initialFilter.run[1]" class="badge badge-pill badge-outline-secondary">до <b>{{$n(filter.run[1])}}</b> км.</span>
                        <span v-if="filter.year[0] != initialFilter.year[0]" class="badge badge-pill badge-outline-secondary">от <b>{{$n(filter.year[0])}}</b> г.</span>
                        <span v-if="filter.year[1] != initialFilter.year[1]" class="badge badge-pill badge-outline-secondary">до <b>{{filter.year[1]}}</b> г.</span>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Авто</th>
                                <th>Цвет</th>
                                <th>VIN</th>
                                <th>Характеристики</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-if="filteredCars.length >0" v-for="(car, index) in filteredCars">
                                <td>
                                    <div class="car-block">
                                        <div class="car-block-icon" v-if="car.image!=null">
                                            <img :src="car.image" class="img-fluid" alt="">
                                        </div>
                                        <div class="car-block-content">
                                            <p class="car-block-content-header">
                                                {{car.model}}
                                            </p>
                                            <p class="car-block-content-footer">
                                                <span>{{car.year}}</span>
                                                <span class="divider">&nbsp;·&nbsp;</span>
                                                <span>{{car.run}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="car-block">
                                        <div class="car-block-icon">
                                            <!-- <img :src="car.image" class="img-fluid" alt=""> -->
                                            <div class="car-block-icon-color" :style="{backgroundColor: car.color_hex}"></div>
                                        </div>
                                        <div class="car-block-content">
                                            <p class="car-block-content-header">
                                                {{car.color}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="car-block">
                                        <div class="car-block-content">
                                            <p class="car-block-content-header">
                                                {{car.vin}}
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="car-block">
                                        <div class="car-block-content">
                                            <p class="car-block-content-header">
                                                <span>{{car.info}}</span>
                                                <span class="divider">&nbsp;·&nbsp;</span>
                                                <span>{{car.engine_type}}</span>
                                            </p>
                                            <p class="car-block-content-footer">
                                                <span>{{car.gearbox}}</span>
                                                <span class="divider">&nbsp;·&nbsp;</span>
                                                <span>{{car.drive}}</span>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" @click.prevent="openModal(car)"><svg width="30" height="30">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16.8053 13.8889C17.0605 14.0305 17.3542 14.1111 17.6667 14.1111H21.2222C21.5347 14.1111 21.8284 14.0305 22.0836 13.8889C22.6301 13.5856 23 13.0027 23 12.3333V8.77778C23 7.79594 22.2041 7 21.2222 7H17.6667C16.9422 7 16.319 7.4333 16.042 8.05488C15.9436 8.27574 15.8889 8.52037 15.8889 8.77778V12.3333C15.8889 12.5907 15.9436 12.8354 16.042 13.0562C16.1995 13.4097 16.469 13.7022 16.8053 13.8889ZM20.6296 18.2593H23V15.8889H20.6296V18.2593H18.2593V15.8889H15.8889V18.2593H18.2593V20.6296H15.8889V23H18.2593V20.6296H20.6296V23H23V20.6296H20.6296V18.2593ZM14.1111 17.6667C14.1111 17.3542 14.0305 17.0605 13.8889 16.8053C13.7022 16.469 13.4097 16.1995 13.0562 16.042C12.8354 15.9436 12.5907 15.8889 12.3333 15.8889H8.77778C8.52037 15.8889 8.27574 15.9436 8.05488 16.042C7.4333 16.319 7 16.9422 7 17.6667V21.2222C7 22.2041 7.79594 23 8.77778 23H12.3333C13.0027 23 13.5856 22.6301 13.8889 22.0836C14.0305 21.8284 14.1111 21.5347 14.1111 21.2222V17.6667ZM13.958 13.0562C14.0564 12.8354 14.1111 12.5907 14.1111 12.3333V8.77778C14.1111 8.52037 14.0564 8.27574 13.958 8.05487C13.681 7.4333 13.0578 7 12.3333 7H8.77778C7.79594 7 7 7.79594 7 8.77778V12.3333C7 13.0578 7.4333 13.681 8.05487 13.958C8.27574 14.0564 8.52037 14.1111 8.77778 14.1111H12.3333C12.5907 14.1111 12.8354 14.0564 13.0562 13.958C13.4569 13.7794 13.7794 13.4569 13.958 13.0562ZM9 9V12.1111H12.1111V9H9ZM9 17.8889V21H12.1111V17.8889H9ZM17.8889 9V12.1111H21V9H17.8889Z"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6.53846C3 4.58422 4.58422 3 6.53846 3H9.92308C10.4754 3 10.9231 3.44772 10.9231 4C10.9231 4.55228 10.4754 5 9.92308 5H6.53846C5.68879 5 5 5.68879 5 6.53846V9.92308C5 10.4754 4.55228 10.9231 4 10.9231C3.44772 10.9231 3 10.4754 3 9.92308V6.53846ZM19.0769 4C19.0769 3.44772 19.5246 3 20.0769 3H23.4615C25.4158 3 27 4.58422 27 6.53846V9.92308C27 10.4754 26.5523 10.9231 26 10.9231C25.4477 10.9231 25 10.4754 25 9.92308V6.53846C25 5.68879 24.3112 5 23.4615 5H20.0769C19.5246 5 19.0769 4.55228 19.0769 4ZM4 19.0769C4.55228 19.0769 5 19.5246 5 20.0769V23.4615C5 24.3112 5.68879 25 6.53846 25H9.92308C10.4754 25 10.9231 25.4477 10.9231 26C10.9231 26.5523 10.4754 27 9.92308 27H6.53846C4.58422 27 3 25.4158 3 23.4615V20.0769C3 19.5246 3.44772 19.0769 4 19.0769ZM26 19.0769C26.5523 19.0769 27 19.5246 27 20.0769V23.4615C27 25.4158 25.4158 27 23.4615 27H20.0769C19.5246 27 19.0769 26.5523 19.0769 26C19.0769 25.4477 19.5246 25 20.0769 25H23.4615C24.3112 25 25 24.3112 25 23.4615V20.0769C25 19.5246 25.4477 19.0769 26 19.0769Z"></path>
                                        </svg></a>
                                </td>
                            </tr>
                            <tr v-if="filteredCars.length == 0" class="text-center">
                                <td colspan="5">Ничего не найдено</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import MultiRangeSlider from "multi-range-slider-vue";
import "multi-range-slider-vue/MultiRangeSliderBarOnly.css";
export default {
    components: {
        MultiRangeSlider,
    },
    data() {
        return {
            showModal: false,
            currentCar: null,
            loading: true,
            data: [],
            total: 21331231230,
            sortBy: 'none',
            meta: null,
            initialFilter: {
                brand: '',
                model: '',
                year: [],
                run: [],
                price: [],
            },
            pdfType: 1,
            filter: {},



        }
    },
    computed: {
        filteredCars() {
            return this.data
                .filter(car => {
                    return (
                        car.brand.toLowerCase().includes(this.filter.brand.toString().toLowerCase()) &&
                        car.model.toLowerCase().includes(this.filter.model.toString().toLowerCase()) &&
                        (this.filter.year[0] == null || car.year >= this.filter.year[0]) &&
                        (this.filter.year[1] == null || car.year <= this.filter.year[1]) &&
                        (this.filter.run[0] == null || car.run_original >= this.filter.run[0]) &&
                        (this.filter.run[1] == null || car.run_original <= this.filter.run[1]) &&
                        (this.filter.price[0] == null || car.price >= this.filter.price[0]) &&
                        (this.filter.price[1] == null || car.price <= this.filter.price[1])
                    )
                })
                .sort((a, b) => {
                    if (this.sortBy == 'none') {
                        return 1;
                    }
                    const sortField = this.sortBy.startsWith('-') ? this.sortBy.substring(1) : this.sortBy;
                    const sortOrder = this.sortBy.startsWith('-') ? -1 : 1;
                    if (a[sortField] < b[sortField]) return -1 * sortOrder;
                    if (a[sortField] > b[sortField]) return 1 * sortOrder;
                    return 0;
                });
        }
    },

    mounted() {
        this.loadData();
    },
    methods: {
        loadData() {
            return axios.get('cars').then(response => {
                // commit('setEntry', response.data)
                this.data = response.data.data;
                this.meta = response.data.meta;

                this.initialFilter.price = [
                    this.meta.min_price * 1,
                    this.meta.max_price * 1,
                ];
                this.initialFilter.year = [
                    this.meta.min_year * 1,
                    this.meta.max_year * 1,
                ];
                this.initialFilter.run = [
                    this.meta.min_run * 1,
                    this.meta.max_run * 1,
                ];

                this.filter = { ...this.initialFilter };
                this.loading = false;
            })
        },

        updatePriceFilter(e) {
            this.filter.price = [e.minValue, e.maxValue];
        },

        updateRunFilter(e) {
            this.filter.run = [e.minValue, e.maxValue];
        },

        updateYearFilter(e) {
            this.filter.year = [e.minValue, e.maxValue];
        },

        changeBrand() {
            this.filter.model = '';
        },

        openModal(car) {
            this.currentCar = car;
            this.showModal = true;
        },

        closeModal() {
            this.currentCar = null;
            this.showModal = false;
        },

        getPdf() {
            let data = {
                'link': this.currentCar.link,
                'vin': this.currentCar.vin_full,
                'brand': this.currentCar.brand,
                'model': this.currentCar.model,
                'year': this.currentCar.year,
                'run': this.currentCar.run_original,
                'type': this.pdfType,
            };
            let params = objectToFormData(data, {
                indices: true,
                booleansAsIntegers: true
            })

            // axios.post('getPdf', params).then(response => {

            //     const blob = new Blob([response.data], { type: response.headers['content-type'] });



            //     this.filter = { ...this.initialFilter };
            //     this.loading = false;
            // })

            axios({
                url: 'getPdf',
                method: 'POST',
                data: params,
                responseType: 'blob',
            }).then((response) => {
                // Create a blob object from the file data
                const blob = new Blob([response.data], { type: response.headers['content-type'] });

                // Create a download link with the file data
                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = 'my-file.pdf';

                // Append the link to the DOM and click it to start the download
                document.body.appendChild(link);
                link.click();

                // Cleanup
                document.body.removeChild(link);
                window.URL.revokeObjectURL(link.href);
            }).catch((error) => {
                console.error('Failed to download PDF:', error);
            });

        },


    }
}
</script>
<style scoped>
.v-modal {
    position: fixed;
    background: #fff;
    z-index: 999999;
    border-radius: 25px;
    padding: 30px;
    min-width: 300px;
    max-width: 600px;
    width: calc(100% - 20px);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.v-modal-close {
    color: red;
    font-size: 48px;
    transform: rotate(45deg);
    display: block;
    position: absolute;
    top: 15px;
    right: 15px;
    cursor: pointer;
}

.v-modal-bg {
    position: fixed;
    background: #000;
    opacity: 0.5;
    z-index: 999998;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;

}

.select-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    width: 100%;
    height: 180px;
    border-radius: 10px;
    background: #f2f2f2;
    color: #2e2d2d;
}

.select-btn.active {
    background: #fff;
    color: #000;
    box-shadow: 0 15px 20px rgba(0, 0, 0, .1), inset 0 0 0 2px #000;
}

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

.car-block-icon-color {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: 1px solid #e0e0e0;

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

.car-row {
    padding: 0 15px;
}

.table-fixed-header {
    overflow: auto;
    max-height: calc(100vh - 70px)
}


th {
    box-shadow: 1px 0px #ddd;
    font-size: 14px !important;
    color: #7b7979;
    font-weight: 400 !important;
    position: sticky;
    top: 0;
    z-index: 1;
    background: #fff;
}

select {
    padding: 5px 10px;
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
<style>
.multi-range-slider-bar-only .thumb::before {
    background: #000 !important;
    border: 6px solid #fff !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, .15) !important;
}

.multi-range-slider-bar-only .caption {
    display: none !important;
}

.multi-range-slider-bar-only .bar-inner {
    background: #000;
    box-shadow: none;
    height: 4px;
    margin-top: 1px;
}

.multi-range-slider-bar-only .bar-right,
.multi-range-slider-bar-only .bar-left {
    padding: 0;
    height: 4px;
    margin-top: 1px;
    box-shadow: none;
    background: #a2a0a0;
}
</style>