<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function time_options()
    {
        return $this->hasMany(TimeFieldOption::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
