<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserReview extends BaseModel
{
    use SoftDeletes;
    
    public function getReviewRole(){
        return $this->belongsTo('App\Models\ReviewRole','role_id');
    }

    public function getReviewUser(){
        return $this->belongsTo('App\User','user_id');
    }

    public function getPatientsData() {
        return $this->belongsTo('App\Models\OpdPatients','patient_id');
    }
}
