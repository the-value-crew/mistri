<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioFieldWithCharge extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function radio_with_charge_options()
    {
        return $this->hasMany(RadioOptionWithCharge::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
