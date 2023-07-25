<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceFieldPdfResource extends JsonResource
{
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
            $media = MediaPdfResource::collection(Media::where('model_type', 'App\Models\ServiceFieldValue')->where('model_id', $valueRealId)->get())->toArray(request());
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'section' => $this->section,
            'value' => $value,
            'media' => $media,
            'comment' => $comment,
            'subfields' => ServiceFieldPdfResource::collection($this->subfields)->toArray(request()), // load subfields when available

        ];
    }
}
