const set = key => (state, val) => {
    state[key] = val
}
  
function initialState() {
    return {
        data: [],
        total: 0,
        query: {},
        loading: false,
        filter: {
            brand: [],
            car_moddels: [],
            diagnosts: [],
        }
    }
}
  
const route = 'service_forms'
  
const getters = {
    data: state => state.data,
    total: state => state.total,
    loading: state => state.loading,
    filter: state => state.filter
}
  
const actions = {
    fetchFilterData({ commit, state }) {
        axios
            .get(route+'/filter')
            .then(response => {
                console.log(response.data)
                commit('setFilter', response.data)
            })
            .catch(error => {
            })
            .finally(() => {
            })
    },
    fetchIndexData({ commit, state }) {
        commit('setLoading', true)
        axios
            .get(route, { params: state.query })
            .then(response => {
                commit('setData', response.data.data)
                commit('setTotal', response.data.meta.total)
            })
            .catch(error => {
                message = error.response.data.message || error.message
                // TODO error handling
            })
            .finally(() => {
                commit('setLoading', false)
            })
    },
    destroyData({ commit, state, dispatch }, id) {
        axios
            .delete(`${route}/${id}`)
            .then(response => {
                dispatch('fetchIndexData')
            })
            .catch(error => {
                message = error.response.data.message || error.message
                // TODO error handling
            })
    },
    print({ commit, state, dispatch }, {id, type}) {
        axios({
            url: `${route}/pdf/${type}/${id}`,
            method: 'GET',
            responseType: 'blob',
        }).then((response) => {

            const blob = new Blob([response.data], { type: response.headers['content-type'] });

            // Create a URL for the blob object
            const url = window.URL.createObjectURL(blob);
        
            // Open the PDF file in a new browser tab or window
            window.open(url, '_blank');

            window.URL.revokeObjectURL(url);

        }).catch((error) => {
            console.error('Failed to download PDF:', error);
        });
    },
    setQuery({ commit }, value) {
        commit('setQuery', _.cloneDeep(value))
    },
    resetState({ commit }) {
        commit('resetState')
    }
}
  
const mutations = {
    setData: set('data'),
    setTotal: set('total'),
    setQuery(state, query) {
        query.page = (query.offset + query.limit) / query.limit
        state.query = query
    },
    setLoading: set('loading'),
    setFilter: set('filter'),
    resetState(state) {
        Object.assign(state, initialState())
    }
}
  
export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
