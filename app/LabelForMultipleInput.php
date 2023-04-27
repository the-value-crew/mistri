<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabelForMultipleInput extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function input_fields()
    {
        return $this->hasMany(MultipleInputField::class,'label_for_multiple_input_id');
    }
}
