<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorDischargeCard extends BaseModel
{
    public function getIndoorBook(){
        return $this->belongsTo('App\Models\IndoorBook','booking_id');
    }

}
