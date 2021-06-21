<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class HolidayManager extends BaseModel
{
    protected $table = 'holiday_manager';

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
}
