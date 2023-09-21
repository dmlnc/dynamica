<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;


class ServiceForm extends Model
{
    use HasAdvancedFilter;

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
    
}
