<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class IvfPayment extends BaseModel
{
    protected $table = 'ivf_payment';

    public function getPatientsData(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id');
    }
}
