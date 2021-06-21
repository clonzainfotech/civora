<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use app\models\Base\BaseModel;

class IUIReport extends BaseModel
{
    protected $table = 'iui_reports';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
}
