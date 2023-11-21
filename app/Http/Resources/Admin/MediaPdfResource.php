<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaPdfResource extends JsonResource
{
    public function toArray($request)
    {
        $imagePath = $this->getPath('preview');
            // Check if the file exists
        if (file_exists($imagePath)) {
            $imageData = file_get_contents($imagePath);
        
            // Encode the image data
            $base64Image = base64_encode($imageData);

            $base64_url = 'data:image/jpeg;base64,' . $base64Image; // for JPEG images
        } else {
            // Handle the case where the file does not exist
            // You could return a placeholder image or set the base64_url to null
            $base64_url = null; // or use a placeholder image
        }

        // $imageData = file_get_contents($imagePath);
    
        // Encode the image data
        // $base64Image = base64_encode($imageData);

        return [
            'id' => $this->id,
            // 'url' => $this->getUrl('thumbnail'),
            'base64_url' => $base64_url,  // for JPEG images
            'name' => $this->name,
            'wasRecentlyCreated' => false,
        ];
    }
}
