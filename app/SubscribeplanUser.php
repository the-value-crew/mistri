<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscribeplanUser extends Model
{
    protected  $table = "subscribeplan_user";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Subscribplan::class,'subscribplan_id');
    }
}
