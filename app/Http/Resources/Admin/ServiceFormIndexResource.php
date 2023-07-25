<?php

namespace App\Http\Resources\Admin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceFormIndexResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'brand' =>[
                'name' => $this->brand->name,
                'model' => $this->car_model->name,
                'image' => Storage::url('brands/'.$this->brand->slug.'.png'),
                'status' => $this->status,
                'diagnost' => $this->diagnost
            ],
            'vin' => '...'.substr((string)$this->vin, -4),
            'color' => [
                'name' => $this->color->name,
                'hex' => $this->color->hex,
            ],
            'date' => [
                'created_at' => $this->created_at,
                'updated_at' => $this->updated_at,
            ]
        ];
        // return parent::toArray($request);
    }
}
