<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    protected $fillable = ['name', 'brand_id'];

    public function brand()
    {
        return $this->belongsTo('Brand', 'brand_id');
    }
}
