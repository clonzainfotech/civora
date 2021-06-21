<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Category extends BaseModel
{
    protected $table = 'category';

    public function getParentCategory(){
        return $this->belongsTo('App\Models\Category','parent_id','id');
    }

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
}
