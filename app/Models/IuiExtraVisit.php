<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class IuiExtraVisit extends BaseModel
{
    public function getSeenBy(){
        return $this->belongsTo('App\user','seen_by','id');
    }
}
