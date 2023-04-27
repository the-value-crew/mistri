<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PestControlOrder extends Model
{
    protected $dates = ['date','time'];





    protected $fillable = [
        'order_id', 'premises_type', 'home_type','home_size','treatment_for','time','date','office_size','number_of_cabin','number_of_desk'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
