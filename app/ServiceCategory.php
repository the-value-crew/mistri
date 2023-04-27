<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User','user_service');
    }

    public function children()
    {
        return $this->hasMany(ServiceCategory::class, 'parent_id');
    }

    public function image_url()
    {
        return $this->image!=null? asset('uploads/servicecategory/'.$this->image):

            asset('uploads/service-default.jpg');
    }

    public function services()
    {
        return $this->hasMany(Service::class,'service_category_id')->where('feature','on')->orderBy('priority','asc');
    }


}
