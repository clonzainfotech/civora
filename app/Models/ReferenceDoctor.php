<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Base\BaseModel;

class ReferenceDoctor extends BaseModel
{
    use SoftDeletes;

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }

    public function getReferencePatients()
    {
        return $this->hasMany('App\Models\OpdPatients','reference_doctor_id');
    }
}
