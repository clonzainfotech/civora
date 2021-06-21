<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorBook extends BaseModel
{
    public function getPatientsDetails(){
        return $this->belongsTo('App\Models\OpdPatients','patient_id');
    }

    public function getRoomType(){
        return $this->belongsTo('App\Models\IndoorType','type_id');
    }

    public function getRoomBed(){
        return $this->belongsTo('App\Models\IndoorBed','bed_id');
    }
    public function getRoom(){
        return $this->belongsTo('App\Models\IndoorRoom','room_id');
    }
    
    public function getprocedure(){
        return $this->belongsTo('App\Models\IndoorProcedure','procedure_id');
    }

    public function getInvoice(){
        return $this->hasOne('App\Models\IndoorInvoice','booking_id');
    }
}
