<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectOption extends Model
{
    protected $fillable = [
        'select_field_id', 'option',
    ];
}
