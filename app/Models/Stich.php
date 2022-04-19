<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Stich extends BaseModel
{
    protected $table = 'stich';
    public function getAppointment() {
        $anc = Appointment::where('patients_id',$this->patients_id)
                ->whereDate('date','=',$this->created_at)
                ->first();
        return $anc;
    }
    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
    public function getSeenBy(){
        return $this->belongsTo('App\user','seen_by','id');
    }
}
