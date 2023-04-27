<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function check_options()
    {
        return $this->hasMany(CheckOption::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

