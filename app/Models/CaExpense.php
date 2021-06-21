<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Carbon\Carbon;

class CaExpense extends Model
{
    public function bankDetail(){
        return $this->belongsTo('App\Models\BankDetail','bank_id');
    }
}
