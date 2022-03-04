<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use App\ANC;
use App\Models\Appointment;


class AncHistory extends BaseModel
{
    protected $table = 'anc_history';

    public function getAncs() {
        return $this->belongsTo('App\Models\ANC','anc_id','id');
    }
    
    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
    public function getAppointment() {
        $anc = Appointment::where('patients_id',$this->patients_id)
                    ->whereDate('date','=',$this->created_at)
                    ->first();
        return $anc;

    }
}
