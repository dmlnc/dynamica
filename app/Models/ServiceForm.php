<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class ServiceForm extends Model implements HasMedia
{
    use HasAdvancedFilter;
    use InteractsWithMedia;


    protected $fillable = ['status', 'brand_id', 'model_id', 'vin', 'diagnost_id', 'color', 'run', 'seller_id', 'comment', 'recommendation','company_id'];

    protected $filterable = [
        'id',
        'brand_id',
        'model_id',
        'vin',
    ];

    protected $orderable = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // 'deleted_at',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    // public function color()
    // {
    //     return $this->belongsTo(Color::class, 'color_id');
    // }

    public function car_model()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }

    public function diagnost()
    {
        return $this->belongsTo(User::class, 'diagnost_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d.m.Y H:i');
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
