function initialState() {
  return {
    entry: {
      id: null,
      emails: '',

      utm_source: '',
      utm_medium: '',
      utm_term: '',
      utm_content: '',
      utm_campaign: '',


      created_at: '',
      updated_at: '',
    },
    loading: false
  }
}

const route = 'settings'

const getters = {
  entry: state => state.entry,
  loading: state => state.loading
}

const actions = {
  updateData({ commit, state, dispatch }) {
    commit('setLoading', true)
    dispatch('Alert/resetState', null, { root: true })

    return new Promise((resolve, reject) => {
      let params = objectToFormData(state.entry, {
        indices: true,
        booleansAsIntegers: true
      })
      axios
        .post(`${route}`, params)
        .then(response => {
          resolve(response)
        })
        .catch(error => {
          let message = error.response.data.message || error.message
          let errors = error.response.data.errors

          dispatch(
            'Alert/setAlert',
            { message: message, errors: errors, color: 'danger' },
            { root: true }
          )

          reject(error)
        })
        .finally(() => {
          commit('setLoading', false)
        })
    })
  },

  setUtmSource({ commit }, value) {
    commit('setUtmSource', value)
  },
  setUtmMedium({ commit }, value) {
    commit('setUtmMedium', value)
  },
  setUtmTerm({ commit }, value) {
    commit('setUtmTerm', value)
  },
  setUtmContent({ commit }, value) {
    commit('setUtmContent', value)
  },
  setUtmCampaign({ commit }, value) {
    commit('setUtmCampaign', value)
  },
  

  setCreatedAt({ commit }, value) {
    commit('setCreatedAt', value)
  },
  setUpdatedAt({ commit }, value) {
    commit('setUpdatedAt', value)
  },
  setEntry({ commit }, entry) {
    commit('setEntry', entry)
  },
  fetchEditData({ commit, dispatch }) {
    return axios.get(`${route}`).then(response => {
      // commit('setEntry', response.data)
      // console.log(response.data)
      return response.data;
    })
  },

  resetState({ commit }) {
    commit('resetState')
  }

}

const mutations = {
  setEntry(state, entry) {
    state.entry = entry
  },
  setUtmSource(state, value) {
    state.entry.utm_source = value
  },
  setUtmMedium(state, value) {
     state.entry.utm_medium = value
  },
  setUtmTerm(state, value) {
     state.entry.utm_term = value
  },
  setUtmContent(state, value) {
     state.entry.utm_content = value
  },
  setUtmCampaign(state, value) {
     state.entry.utm_campaign = value
  },
  
  setCreatedAt(state, value) {
    state.entry.created_at = value
  },
  setUpdatedAt(state, value) {
    state.entry.updated_at = value
  },
  
  setLoading(state, loading) {
    state.loading = loading
  },
  resetState(state) {
    state = Object.assign(state, initialState())
  }
}

export default {
  namespaced: true,
  state: initialState,
  getters,
  actions,
  mutations
}
