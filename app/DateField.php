<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function dateFieldValue()
    {
        return $this->hasOne(DateValue::class,'field_id');
    }
}
