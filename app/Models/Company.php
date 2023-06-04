<?php

namespace App\Models;


use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Casts\Explode;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasAdvancedFilter;
    // use SoftDeletes;
    
    protected $fillable = ['name', 'abilities'];

    protected $casts = [
        'abilities' => Explode::class,
    ];
    
    protected $filterable = [
        'id',
        'name',
    ];

    protected $orderable = [
        'id',
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        // 'deleted_at',
    ];


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
