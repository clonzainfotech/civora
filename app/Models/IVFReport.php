<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use app\models\Base\BaseModel;

class IVFReport extends BaseModel
{
    protected $table = 'ivf_reports';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
}
