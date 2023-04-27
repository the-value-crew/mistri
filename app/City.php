<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User','user_city');
    }

    public function areas()
    {
        return $this->hasMany(City::class, 'parent_id');
    }

}
