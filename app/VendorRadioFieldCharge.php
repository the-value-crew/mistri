<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorRadioFieldCharge extends Model
{
    protected $fillable = [
        'service_provider_id', 'field_id', 'option_id','service_id','charge'
    ];
}
