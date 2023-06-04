const set = key => (state, val) => {
    state[key] = val
  }
  
  function initialState() {
    return {
      list: [],
      company: {},
      loading: false
    }
  }
  
  const route = 'companies/list'
  
  const getters = {
    list: state => state.list,
    loading: state => state.loading,
    company: state => state.company
  }
  
  const actions = {
    fetchListData({ commit, state }) {
      commit('setLoading', true)
      axios
        .get(route)
        .then(response => {
          commit('setList', response.data.data)
        })
        .catch(error => {
          message = error.response.data.message || error.message
        })
        .finally(() => {
          commit('setLoading', false)
        })
    },
    resetState({ commit }) {
      commit('resetState')
    },
    setCompany({ commit }, value) {
      commit('setCompany', value)
      localStorage.company = JSON.stringify(value);
    },
  }
  
  const mutations = {
    setList: set('list'),
    setLoading: set('loading'),
    setCompany(state, value){
      state.company = value;
    },
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
  