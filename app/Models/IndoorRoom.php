<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorRoom extends BaseModel
{
//    public function relations() {
//        return $this->belongsTo('App\Models\IndooeType','type_id');
//    }

    public function getIndoorBookData(){
        return $this->hasOne('App\Models\IndoorBook','room_id')->where('is_direct_discharge',0);
    }

    public function Beds() {
        return $this->hasMany('App\Models\IndoorBed','room_id');
    }

    public function Type() {
        return $this->belongsTo('App\Models\IndoorType','type_id');
    }

}
