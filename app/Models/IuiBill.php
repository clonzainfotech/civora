<?php

namespace App\Models;
use App\Models\Base\BaseModel;


class IuiBill extends BaseModel
{
    protected $table = 'iui_bill';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','patient_id');
    }
}
