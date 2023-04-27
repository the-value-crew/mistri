<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextareaValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'value'
    ];
}
