<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{


    public function users()
    {
        return $this->belongsToMany(User::class,'user_service')->withPivot([
            'service_id',
            'user_id',
            'state',

        ])->where('state','approved');
    }

    public function service_category()
    {
        return $this->belongsTo('App\ServiceCategory','service_category_id');
    }





    public function image_url()
    {
        return $this->image!=null? asset('uploads/service/'.$this->image):

            asset('uploads/service-default.jpg');
    }


    public function text_fields()
    {
        return $this->hasMany(TextField::class);
    }

    public function label_for_multiple_fields()
    {
        return $this->hasMany(LabelForMultipleInput::class);
    }

    public function textarea_fields()
    {
        return $this->hasMany(TextareaField::class);
    }

    public function date_fields()
    {
        return $this->hasMany(DateField::class);
    }

    public function time2_fields()
    {
        return $this->hasMany(Time2Field::class);
    }

    public function time_fields()
    {
        return $this->hasMany(TimeField::class);
    }

    public function check_with_charge_fields()
    {
        return $this->hasMany(CheckFieldWithCharge::class);
    }

    public function check_fields()
    {
        return $this->hasMany(CheckField::class);
    }

    public function radio_with_charge_fields()
    {
        return $this->hasMany(RadioFieldWithCharge::class);
    }

    public function radio_fields()
    {
        return $this->hasMany(RadioField::class);
    }

    public function select_with_charge_fields()
    {
        return $this->hasMany(SelectFieldWithCharge::class);
    }

    public function select_fields()
    {
        return $this->hasMany(SelectField::class);
    }
}
