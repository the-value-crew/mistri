<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextareaField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function textareaFieldValue()
    {
        return $this->hasOne(TextareaValue::class,'field_id');
    }

}
