<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IvfPlanReport extends Model
{
    protected $table = 'ivf_plan_report';
    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
}
