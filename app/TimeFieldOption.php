<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeFieldOption extends Model
{
    protected $fillable = [
        'time_field_id', 'time',
    ];
}
