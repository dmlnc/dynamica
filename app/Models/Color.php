<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = ['name', 'hex'];

    public function service()
    {
        return $this->hasMany(ServiceForm::class, 'color_id');
    }

}
