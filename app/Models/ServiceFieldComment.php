<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFieldComment extends Model
{
    protected $fillable = ['field_id', 'value', 'service_form_id'];

    protected $table = 'service_fields_comments';

    public function field()
    {
        return $this->belongsTo('ServiceField', 'field_id');
    }

    public function form()
    {
        return $this->belongsTo('ServiceForm', 'service_form_id');
    }
}
