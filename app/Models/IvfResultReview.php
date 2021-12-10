<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use app\models\Base\BaseModel;

class IvfResultReview extends BaseModel
{
    protected $table = 'ivf_result_reviews';

    public function getPatients(){
        return $this->belongsTo('App\Models\OpdPatients','patients_id','id');
    }
}
