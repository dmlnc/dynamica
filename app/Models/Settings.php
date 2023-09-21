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
        'company_id',
        'asp_link',
        'export_link',
        'cm_company_id',
        'telegram_id',
        'min_price',
        'max_price',
        'emails',
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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
