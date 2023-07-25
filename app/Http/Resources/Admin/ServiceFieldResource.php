<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceFieldResource extends JsonResource
{
    // public $test;

    // public function __construct($resource, $serviceFormId)
    // {
    //     // Ensure you call the parent constructor
    //     parent::__construct($resource);
    //     $this->test = $serviceFormId;
    // }

    public function toArray($request)
    {

        $values = json_decode($this->values);
        $valuesCollection = collect($values);
        $valueId = $this->value->where('service_form_id', $this->service_form_id)->first();
        $value = null;
        $valueRealId = null;
        if($valueId!= null){
            $valueRealId = $valueId->id;
            $valueId = $valueId->value*1;
            $value = $valuesCollection->where('id', $valueId)->first();
        }
        foreach ($this->subfields as $field) {
            $field->service_form_id = $this->service_form_id;
        }
        
        $comment = $this->comments->where('service_form_id', $this->service_form_id)->first();
        if($comment != null){
            $comment = $comment->value;
        }

        $media = [];

        if($valueRealId != null){
            $media = ThumbnailResource::collection(Media::where('model_type', 'App\Models\ServiceFieldValue')->where('model_id', $valueRealId)->get());
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'section' => $this->section,
            // 'type' => $this->type,
            'input' => $this->input,
            'values' => $values, // ensure values is in the array format
            // 'parent_id' => $this->parent_id,
            'required' => $this->required,
            'subfields' => ServiceFieldResource::collection($this->subfields), // load subfields when available
            'value' => $value,
            'media' => $media,
            'comment' => $comment,
        ];
    }
}
