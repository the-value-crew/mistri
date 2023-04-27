<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time2Field extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function time2FieldValue()
    {
        return $this->hasOne(Time2Value::class,'field_id');
    }

}
