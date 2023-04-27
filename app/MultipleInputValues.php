<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MultipleInputValues extends Model
{

    protected $fillable = [
        'order_id', 'label_for_multiple_input_id', 'multiple_input_field_id','value'
    ];
}
