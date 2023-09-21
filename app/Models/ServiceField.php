<?php

namespace App\Models;

use App\Models\ServiceFieldValue;
use Illuminate\Database\Eloquent\Model;

class ServiceField extends Model
{
    protected $fillable = ['name', 'section', 'type', 'input', 'values', 'parent_id', 'required', 'order'];

    /**
     * Get the subfields for the service field.
     */
    public function subfields()
    {
        return $this->hasMany(ServiceField::class, 'parent_id');
    }

    /**
     * Get the parent field that owns the service field.
     */
    public function parentField()
    {
        return $this->belongsTo(ServiceField::class, 'parent_id');
    }

    public function value()
    {
        return $this->hasMany(ServiceFieldValue::class, 'field_id');
    }

    public function comments()
    {
        return $this->hasMany(ServiceFieldComment::class, 'field_id');
    }
}
