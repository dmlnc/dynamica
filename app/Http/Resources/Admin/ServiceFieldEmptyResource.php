<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceFieldEmptyResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'section' => $this->section,
            // 'type' => $this->type,
            'input' => $this->input,
            'values' => json_decode($this->values), // ensure values is in the array format
            // 'parent_id' => $this->parent_id,
            'required' => $this->required,
            'subfields' => ServiceFieldEmptyResource::collection($this->whenLoaded('subfields')), // load subfields when available
            'value' => null,
            'media' => [],
            'comment' => null,
        ];
    }
}
