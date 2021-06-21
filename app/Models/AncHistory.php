<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\ANC;

class AncHistory extends BaseModel
{
    protected $table = 'anc_history';

    public function getAncs() {
        return $this->belongsTo('App\Models\ANC','patients_id','patients_id');
    }
    
    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
}
