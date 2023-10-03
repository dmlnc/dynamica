<template>
    <div>
        <div class="form-group" :class="{'bmd-form-group' : minified, 'has-items': field.value!=null}">
            <label :class="{
                'required' : field.required, 
                'bmd-label-floating': minified,
                'label-default': !minified,
                }">{{ field.name }}</label>
            <v-select
            v-if="field.input === 'select'"
            :name="field.name"
            label="value"
            :key="`${field.name}-field`"
            :value="field.value"
            :options="field.values"
            :closeOnSelect="true"
            :clearable="false"
            @input="e => updateField(field.id, e)"
            :searchable="false"
            required
            :disabled="disabled"
            >
                <template #option="props">
                    <div style="display: flex; align-items: center;">
                        <div 
                            :style="{
                            background: props.color,
                            border: '2px solid white',
                            borderRadius: '50%',
                            width: '20px',
                            height: '20px',
                            marginRight: '10px',
                            flex: '0 0 20px'
                            }"
                        ></div>
                        <div>{{ props.value }}</div>
                    </div>
                </template>
                <template #selected-option="props">
                    <div style="display: flex; align-items: center;">
                        <div 
                            :style="{
                            background: props.color,
                            border: '2px solid white',
                            borderRadius: '50%',
                            width: '20px',
                            height: '20px',
                            marginRight: '10px',
                            flex: '0 0 20px'
                            }"
                        ></div>
                        <div>{{ props.value }}</div>
                    </div>
                </template>
            </v-select>
    
            <!-- Render text input if the field input is 'text' -->
            <input
                v-else
                class="form-control"
                type="text"
                :name="field.name"
                :value="field.value"
                @input="e => updateField(field.id, e.target.value)"
                :required="field.required"
                :readonly="disabled"
            />
            
        </div>
        <div class="field-more mt-4" v-if="value.showSubfields || value.showComments || value.showPhoto">
            <div class="form-group" v-if="value.showComments">
                <label :for="`comment-for-${field.id}`">Комментарий</label>
                <textarea :disabled="disabledComment" @input="e => updateComment(field.id, e.target.value)" class="form-control" :id="`comment-for-${field.id}`" rows="3">{{ field.comment }}</textarea>
            </div>
            <Attachment 
                v-if="value.showPhoto"
                @file-uploaded="(e)=>{uploadMedia(field.id, e)}" 
                @file-removed="(e)=>{removeMedia(field.id, e)}" 
                component="pictures" 
                route="/api/v1/service_forms/media" 
                collectionName="fieldPhoto" 
                :media="field.media"
                :disabled="disabled"
            />
            
            <div  v-if="value.showSubfields" >
                <div v-for="(subfield, index) in field.subfields" :key="subfield.id">
                    <div class="d-flex">
                        <div 
                            class="d-flex align-items-center justify-content-center text-center"
                            :style="{
                                background: subfield.value == null ? 'red' : '#4ba82e',
                                borderRadius: '50%',
                                width: '10px',
                                height: '10px',
                                flex: '0 0 10px',
                                fontSize: '12px',
                                marginTop: '20px',
                                marginRight: '10px'
                            }"
                        >
                        </div>
                        <Field 
                            @uploadMedia="uploadMedia" 
                            @removeMedia="removeMedia" 
                            @updateField="updateField" 
                            @updateComment="updateComment" 
                            class="mb-2 w-100" 
                            :minified="true" 
                            :field="subfield" 
                            :entry="entry"
                            :disabled="disabled"
                            :disabledComment="disabledComment"></Field>
                        </div>
                </div>
            </div>
            
        </div>
             
     </div>
</template>
  
<script>
    import Field from './Field.vue'
    import Attachment from './Attachments/Attachment'

    export default {
        name: 'Field', 
        props: {
            field: {
                type: Object,
                required: true
            },
            entry: {
                type: Object,
                required: true
            },
            minified: {
                type: Boolean,
                required: false,
                default: false,
            },
            disabled: {
                type: Boolean,
                required: false,
                default: false,
            },
            disabledComment: {
                type: Boolean,
                required: false,
                default: false,
            },
            
        },
        data() {
            return {
                activeField: null
            }
        },
        computed: {
            value(){
                return this.field.value || { showComments: false, showSubfields: false, showPhoto: false };
            }
        },
        
        components:{
            'Field': Field,
            Attachment,
        },
        methods: {
            updateField(fieldId, value) {
                this.$emit('updateField', fieldId, value)
            },
            uploadMedia(fieldId, value){
                this.$emit('uploadMedia', fieldId, value)
            },
            removeMedia(fieldId, value){
                if(value.hasOwnProperty('wasRecentlyCreated')){
                    if(value.wasRecentlyCreated == false){
                        this.$emit('removeMedia', fieldId, value)
                    }
                }
            },
            updateComment(fieldId, value) {
                this.$emit('updateComment', fieldId, value)
            },
        }
    }
</script>
<style scoped>
    .form-group .label-default{
        font-size: 16px;
    }
    .form-group label{
        color: #000!important;
    }
    .field-more{
        width: 100%;
        border-left: 1px solid #4ba82e;
        padding-left: 30px;
    }
</style>
  