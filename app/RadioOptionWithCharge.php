<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioOptionWithCharge extends Model
{
    protected $fillable = [
        'radio_field_with_charge_id', 'option','charge',
    ];

    public function radio_field_with_charge()
    {
        return $this->belongsTo(RadioFieldWithCharge::class);
    }
}
