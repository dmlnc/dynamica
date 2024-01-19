<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceFormResource extends JsonResource
{
    public function toArray($request)
    {

      

        return [
            'id' => $this->id,
            'status' => $this->status,
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'color' => $this->color,
            'vin' => $this->vin,
            'comment' => $this->comment,
            'diagnost_id' => $this->diagnost_id,
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'run' => $this->run,
            'recommendation' => $this->recommendation,
            'lkp_data' => $this->lkp_data,
            'damages_list' => $this->damages_list,

            // Загрузка медиа для коллекции VIN
            'vin_media' => ThumbnailResource::collection(Media::where('model_type', 'App\Models\ServiceForm')->where('model_id', $this->id)->where('collection_name', 'vin')->get()),
            // Загрузка медиа для коллекции extra
            'extra_media' => ThumbnailResource::collection(Media::where('model_type', 'App\Models\ServiceForm')->where('model_id', $this->id)->where('collection_name', 'extra')->get()),

            // Дополнительные отношения
            'brand' => $this->brand, // Предполагается, что у вас есть метод brand в модели
            'car_model' => $this->car_model, // Предполагается, что у вас есть метод car_model в модели
            'diagnost' => $this->diagnost, // Предполагается, что у вас есть метод diagnost в модели
        ];
    }
}
