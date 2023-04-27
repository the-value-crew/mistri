<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioOption extends Model
{
    protected $fillable = [
        'radio_field_id', 'option',
    ];
}
