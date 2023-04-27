<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleInputField extends Model
{
    protected $fillable = [
        'label_for_multiple_input_id', 'input_field_label',
    ];

    public function parent_label()
    {
        return $this->belongsTo(LabelForMultipleInput::class,'label_for_multiple_input_id');
    }
}
