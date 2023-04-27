<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TextField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


}
