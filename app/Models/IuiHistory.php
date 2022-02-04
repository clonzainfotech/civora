<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class IuiHistory extends BaseModel
{
    use SoftDeletes;
    
    protected $table = 'iui_history';

    public function getPatientsInfoData(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
    public function getPatientsDetails(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id');
    }
    public function lastAppointmentData(){
        return $this->hasOne('App\Models\Appointment','patients_id','patients_id')->orderBy('id','DESC');
    }
}
