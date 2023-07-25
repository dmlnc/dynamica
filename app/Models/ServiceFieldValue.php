<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ServiceFieldValue extends Model implements HasMedia
{

    use InteractsWithMedia;
    protected $fillable = ['field_id', 'value', 'service_form_id'];

    protected $table = 'service_fields_values';

    public function field()
    {
        return $this->belongsTo('ServiceField', 'field_id');
    }

    public function form()
    {
        return $this->belongsTo('ServiceForm', 'service_form_id');
    }
    

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 500;
        $thumbnailHeight = 500;

        $previewWidth = 1200;
        $previewHeight = 1200;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('fill', $thumbnailWidth, $thumbnailHeight)
            ->background('ffffff');

        $this->addMediaConversion('preview')
            ->width($previewWidth)
            ->height($previewHeight)
            ->fit('contain', $previewWidth, $previewHeight);

    }

}
