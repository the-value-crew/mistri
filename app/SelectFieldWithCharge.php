<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectFieldWithCharge extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];
    public function select_with_charge_options()
    {
        return $this->hasMany(SelectOptionWithCharge::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
