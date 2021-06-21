<?php

namespace App\Models;

use App\Models\Base\BaseModel;

use Illuminate\Database\Eloquent\Model;

class IndoorBed extends BaseModel
{
    public function room() {
        return $this->belongsTo('App\Models\IndoorRoom','room_id');
    }
}
