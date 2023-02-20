<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Model
{
    use HasAdvancedFilter;
    // use SoftDeletes;
    use HasFactory;

    public $table = 'settings';

    protected $orderable = [
        'id',
    ];

    protected $filterable = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'utm_source',
        'utm_medium',
        'utm_term',
        'utm_content',
        'utm_campaign',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
