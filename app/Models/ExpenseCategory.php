<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class ExpenseCategory extends BaseModel
{
    protected $table = 'expance_category';

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
}
