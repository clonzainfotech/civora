<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class ComplaintMedicine extends BaseModel
{
    public function getMedicinesData(){
        return $this->belongsTo('App\Models\Medicine','medicine_id');
    }
}
