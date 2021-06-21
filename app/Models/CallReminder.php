<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallReminder extends Model
{
    public function getPatientData(){
        return $this->belongsTo('App\Models\OpdPatients', 'patients_id', 'id');
    }

    public function getIuiPatientData(){
        return $this->belongsTo('App\Models\IUI', 'patients_id', 'patients_id');
    }
}
