<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectOptionWithCharge extends Model
{
    protected $fillable = [
        'select_field_with_charge_id', 'option','charge',
    ];

    public function select_field_with_charge()
    {
        return $this->belongsTo(SelectFieldWithCharge::class);
    }
}
