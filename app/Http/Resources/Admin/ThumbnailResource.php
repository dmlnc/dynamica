<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ThumbnailResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'url' => $this->getUrl('thumbnail'),
            'name' => $this->name,
            'wasRecentlyCreated' => false,
        ];
    }
}
