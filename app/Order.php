<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'provider_id');
    }



    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function radioWithCharge()
    {
        return $this->belongsTo(RadioWithChargeValue::class);
    }


    public function pest_control_order()
    {
        return $this->hasOne(PestControlOrder::class,'order_id');
    }

    public function paint_control_order()
    {
        return $this->hasOne(PaintingOrder::class,'order_id');
    }


    public function deep_clean_order()
    {
        return $this->hasOne(DeepcleaningOrder::class,'order_id');
    }

    public function sanitization_order()
    {
        return $this->hasOne(SanitizationOrder::class,'order_id');
    }


}
