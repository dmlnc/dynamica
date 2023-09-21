<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaPdfResource extends JsonResource
{
    public function toArray($request)
    {
        $imagePath = $this->getPath('preview');
        $imageData = file_get_contents($imagePath);
    
        // Encode the image data
        $base64Image = base64_encode($imageData);

        return [
            'id' => $this->id,
            // 'url' => $this->getUrl('thumbnail'),
            'base64_url' => 'data:image/jpeg;base64,' . $base64Image,  // for JPEG images
            'name' => $this->name,
            'wasRecentlyCreated' => false,
        ];
    }
}
