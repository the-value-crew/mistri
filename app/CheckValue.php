<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function check_option()
    {
        return $this->belongsTo(CheckOption::class,'option_id');
    }
}
