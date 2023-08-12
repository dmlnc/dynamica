function initialState() {
    return {
      entry: {
        id: null,
        name: '',
        email: null,
        company_id: null,
        email_verified_at: '',
        password: null,
        roles: [],
        remember_token: '',
        created_at: '',
        updated_at: '',
        deleted_at: ''
      },
      lists: {
        roles: []
      },
      loading: false
    }
  }
  
  const route = 'users'
  
  const getters = {
    entry: state => state.entry,
    lists: state => state.lists,
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
        params.set('_method', 'PUT')
        axios
          .post(`${route}/${state.entry.id}`, params)
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
    setName({ commit }, value) {
      commit('setName', value)
    },
    setEmail({ commit }, value) {
      commit('setEmail', value)
    },
    setEmailVerifiedAt({ commit }, value) {
      commit('setEmailVerifiedAt', value)
    },
    setPassword({ commit }, value) {
      commit('setPassword', value)
    },
    // setRoles({ commit }, value) {
    //   commit('setRoles', value)
    // },
    // setCompanyId({ commit }, value) {
    //   commit('setCompanyId', value)
    // },
    setRememberToken({ commit }, value) {
      commit('setRememberToken', value)
    },
    setCreatedAt({ commit }, value) {
      commit('setCreatedAt', value)
    },
    setUpdatedAt({ commit }, value) {
      commit('setUpdatedAt', value)
    },
    setDeletedAt({ commit }, value) {
      commit('setDeletedAt', value)
    },
    
    fetchEditData({ commit, dispatch }, id) {
      axios.get(`${route}/profile/edit`).then(response => {
        commit('setEntry', response.data.data)
        // commit('setLists', response.data.meta)
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
    setName(state, value) {
      state.entry.name = value
    },
    setEmail(state, value) {
      state.entry.email = value
    },
    setEmailVerifiedAt(state, value) {
      state.entry.email_verified_at = value
    },
    setPassword(state, value) {
      state.entry.password = value
    },
    // setRoles(state, value) {
    //   state.entry.roles = value
    // },
    // setCompanyId(state, value) {
    //   state.entry.company_id = value
    // },
    
    setRememberToken(state, value) {
      state.entry.remember_token = value
    },
    setCreatedAt(state, value) {
      state.entry.created_at = value
    },
    setUpdatedAt(state, value) {
      state.entry.updated_at = value
    },
    setDeletedAt(state, value) {
      state.entry.deleted_at = value
    },
    setLists(state, lists) {
      state.lists = lists
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
  