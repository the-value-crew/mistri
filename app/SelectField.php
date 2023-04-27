<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectField extends Model
{
    protected $fillable = [
        'label_for_form', 'label_for_invoice', 'service_id',
    ];

    public function select_options()
    {
        return $this->hasMany(SelectOption::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
