<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckWithChargeValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function check_options()
    {
        return $this->belongsTo(CheckOptionWithCharge::class,'option_id');
    }
}
