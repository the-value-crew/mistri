<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function radio_option()
    {
        return $this->belongsTo(RadioOption::class,'option_id');
    }
}
