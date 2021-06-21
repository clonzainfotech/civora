<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IvfTransferReport extends Model
{
    public function getPatient() {
        return $this->belongsTo('App\Models\OpdPatients','patient_id');
    }
}
