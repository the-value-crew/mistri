<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResidentialPestControl extends Model
{
    public function treatment()
    {
        return $this->belongsTo(PestControlTreatmentType::class,'pest_control_treatment_type_id');
    }
}
