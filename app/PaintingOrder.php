<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaintingOrder extends Model
{
    protected $dates = ['date','time'];

    protected $fillable = [
        'order_id', 'premises_type', 'home_type','home_size','paint_type1','paint_type2','current_color','furnished','ceiling_paint','time','date','office_size','number_of_cabin','number_of_desk','comment'
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
