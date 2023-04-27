<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'value'
    ];
}
