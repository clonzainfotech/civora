<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Hormon extends BaseModel
{
    protected $table = 'hormon';

    public function categoryDetails(){
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function reference_doctor_name(){
        return $this->belongsTo('App\Models\ReferenceDoctor','reference_doctor_id');
    }
}
