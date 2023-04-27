<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    protected  $table ='user_service';

    public function service()
    {
        return $this->belongsTo(Service::class,'service_id');
    }

    public function vendor()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
