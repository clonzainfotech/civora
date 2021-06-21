<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorType extends BaseModel
{
//    public function getroom() {
//            return $this->hasOne('App\Models\IndoorRoom','type_id','id');
//    }

    public function TypeshasManyRooms() {
        return $this->hasMany('App\Models\IndoorRoom','type_id')->whereNotNull('room_no')->whereStatus(1)->orderBy('room_no','asc');
    }

    public function Rooms() {
        return $this->hasMany('App\Models\IndoorRoom','type_id');
    }

    public function GetBookPatient(){
        return $this->hasMany('App\Models\IndoorBook', 'type_id');
    }
}
