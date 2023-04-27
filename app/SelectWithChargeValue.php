<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectWithChargeValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function select_options()
    {
        return $this->belongsTo(SelectOptionWithCharge::class,'option_id');
    }
}
