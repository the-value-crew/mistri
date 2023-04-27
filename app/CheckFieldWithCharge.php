<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckFieldWithCharge extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function check_with_charge_options()
    {
        return $this->hasMany(CheckOptionWithCharge::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
