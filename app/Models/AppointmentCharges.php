<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class AppointmentCharges extends BaseModel
{
    protected $tables = 'appointment_charges';

    public function getAppointment(){
        return $this->belongsTo('App\Models\Appointment','appointment_id');
    }
    
    public function getReferenceDoctors(){
        return $this->belongsTo('App\Models\ReferenceDoctor','reference_doctor_id');
    }

    public function getUser(){
        return $this->belongsTo('App\User','created_by', 'id');
    }
}
