<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RadioField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function radio_options()
    {
        return $this->hasMany(RadioOption::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
