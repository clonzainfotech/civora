<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class ANC extends BaseModel
{
    protected $table = 'anc';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
}
