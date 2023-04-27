<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOption extends Model
{
    protected $fillable = [
        'check_field_id', 'option',
    ];
}
