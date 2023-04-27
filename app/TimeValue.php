<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id'
    ];

    public function time_option()
    {
        return $this->belongsTo(TimeFieldOption::class,'option_id');
    }
}
