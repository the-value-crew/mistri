<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioWithChargeValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function radio_options()
    {
        return $this->belongsTo(RadioOptionWithCharge::class,'option_id');
    }
}