<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Model;

class IndoorInvoice extends BaseModel
{
    public function getBookedBed(){
        return $this->belongsTo('App\Models\IndoorBook','booking_id');
    }
}
