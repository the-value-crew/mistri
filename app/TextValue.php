<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'value'
    ];
}
