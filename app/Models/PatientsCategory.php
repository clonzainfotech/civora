<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class PatientsCategory extends BaseModel
{
    protected $table = 'patients_category';

    public function getCategories() {
        return $this->belongsTo('App\Models\Category','category_id');
    }
}
