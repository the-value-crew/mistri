<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckOptionWithCharge extends Model
{
    protected $fillable = [
        'check_field_with_charge_id', 'option','charge',
    ];

    public function check_field_with_charge()
    {
        return $this->belongsTo(CheckFieldWithCharge::class);
    }
}
