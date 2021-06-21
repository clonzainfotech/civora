<?php

namespace App\Models;

use App\Models\Base\BaseModel;


class Donor extends BaseModel
{
    public function getPatient() {
        return $this->belongsTo('App\Models\OpdPatients','patients_id');
    }

    public function getAppointments() {
        return $this->hasMany('App\Models\Appointment','patients_id', 'id');
    }
}
