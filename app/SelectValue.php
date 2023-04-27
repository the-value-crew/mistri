<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectValue extends Model
{
    protected $fillable = [
        'order_id', 'field_id', 'option_id','qty'
    ];

    public function select_option()
    {
        return $this->belongsTo(SelectOption::class,'option_id');
    }
}
