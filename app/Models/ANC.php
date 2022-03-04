<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\Models\Appointment;


class ANC extends BaseModel
{
    protected $table = 'anc';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
    public function getAppointment() {
        $anc = Appointment::where('patients_id',$this->patients_id)
                ->whereDate('date','=',$this->created_at)
                ->first();
        return $anc;
    }
}
