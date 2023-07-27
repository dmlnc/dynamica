import Vue from 'vue'

function areAllRequiredFieldsFilled(fields) {
  let result = {};
  // console.log('call');
  fields.forEach(field => {
      // Если поле не обязательно, пропускаем его
      if(result[field.section] && result[field.section] == true){
        // console.log('skip')
      }
      else{
        if (field.required == 1) {
          if (field.value == null) {
            result[field.section] = true;
            // console.log('valuee ull', field);
          }
          else{
            if(field.value.showSubfields == true){
              if (field.subfields ) {
                result[field.section] = areAllRequiredFieldsFilled(field.subfields)[field.section];
              }
            }
            else{
              result[field.section] = false;
            }
          }
        }
      }
  });
  return result;
}


function searchField(fields, fieldId) {
  for (let field of fields) {
    if (field.id === fieldId) {
      return field;
    }
    if (field.subfields ) {
      let data = searchField(field.subfields, fieldId);
      if(data != false){
        return data;
      }
    }
  }
  return false;
}

function cleanFields(fields, parent_id = null) {
  let cleaned = [];

  for (let field of fields) {
    let { id, value, media, comment, subfields, required } = field;
    
    // Push the cleaned field to the array
    cleaned.push({ id, value, media, comment, parent_id, required });

    // If there are subfields, clean them recursively and add to the array
    if (subfields) {
      cleaned = cleaned.concat(cleanFields(subfields, id*1));
    }
  }
  return cleaned;
}

function initialState() {
    return {
      entry: {
        id: null,
        brand: null,
        car_model: null,
        color: null,
        vin: null,
        comment: null,
        created_at: '',
        updated_at: '',
        // deleted_at: ''
      },
      fields: [],
      lists: {
        colors: [],
        brands: [],
        models: [], 
      },
      fieldsEmpty: {},
      loading: false
    }
  }
  
  const route = 'service_forms'
  
  const getters = {
    entry: state => state.entry,
    lists: state => state.lists,
    loading: state => state.loading,
    fields: state => state.fields,
    fieldsEmpty: state=> state.fieldsEmpty,
  }
  
  
  const actions = {
    storeData({ commit, state, dispatch }, status = 'draft') {
      commit('setLoading', true)
      dispatch('Alert/resetState', null, { root: true })
      
      return new Promise((resolve, reject) => {
        let params = objectToFormData(
          {...state.entry,
            fields: cleanFields(state.fields),
            status: status,
          } 
          ,{
          indices: true,
          booleansAsIntegers: true
          }
        )

        let aRoute = route;

        if(state.entry.id != null){
          params.set('_method', 'PUT')
          aRoute = `${route}/${state.entry.id}`
        }

        axios
          .post(aRoute, params)
          .then(response => {
            commit('setEntryId', response.data.data.id)

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

    setData({ commit }, value) {
      commit('setEntry', value)
    },
    setField({ commit }, {field, value}) {
      commit('setField', {field, value})
    },
    setCustomField({ commit }, payload) {
      commit('setCustomField', payload)
    },
    setCustomFieldComment({ commit }, payload) {
      commit('setCustomFieldComment', payload)
    },
    uploadMediaToField({ commit }, payload) {
      commit('uploadMediaToField', payload)
    },
    removeMediaFromField({ commit }, payload) {
      commit('removeMediaFromField', payload)
    },
    fetchCreateData({ commit }) {
      axios.get(`${route}/create`).then(response => {
        commit('setLists', response.data.meta)
        commit('setFields', response.data.fields)
      })
    },
    fetchEditData({ commit, dispatch }, id) {
      axios.get(`${route}/${id}/edit`).then(response => {
        commit('setEntry', response.data.data)
        commit('setLists', response.data.meta)
        commit('setFields', response.data.fields)
      })
    },
    // fetchShowData({ commit, dispatch }, id) {
    //   axios.get(`${route}/${id}`).then(response => {
    //     commit('setEntry', response.data.data)
    //   })
    // },
    resetState({ commit }) {
      commit('resetState')
    }
  }
  
  const mutations = {
    setEntry(state, entry) {
      state.entry = entry
    },
    setField(state, {field, value}){
        state.entry[field] = value
        state.fieldsEmpty = areAllRequiredFieldsFilled(state.fields);
    },
    setCustomField(state, {fieldId, value}){
      // console.log(fieldId)

      let field = searchField(state.fields, fieldId);
      if(field!=false){
        field.value = value;
      }
      state.fieldsEmpty = areAllRequiredFieldsFilled(state.fields);

    },
    setCustomFieldComment(state, {fieldId, value}){
      let field = searchField(state.fields, fieldId);
      if(field!=false){
        field.comment = value;
      }
    },
    uploadMediaToField(state, {fieldId, media}) {
      let field = searchField(state.fields, fieldId);
      if(field!=false){
        field.media = [...field.media, media];
      }
    },
    removeMediaFromField(state, {fieldId, media}) {
      let field = searchField(state.fields, fieldId);
      if(field!=false){
        field.media = field.media.filter(item => item.id !== media.id);
      }
      axios.delete('media/' + media.id)
        .then(response => {
        })
        .catch(error => {
          console.error(error)
        })
    },

    setLists(state, lists) {
        state.lists = lists
    },
    setFields(state, fields){
      state.fields = fields
      state.fieldsEmpty = areAllRequiredFieldsFilled(state.fields);
    },
    setLoading(state, loading) {
      state.loading = loading
    },
    setEntryId(state, id) {
      state.entry.id = id;
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
  