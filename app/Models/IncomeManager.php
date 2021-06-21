<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class IncomeManager extends BaseModel
{
    protected $table = 'income_manager';

    
    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }

    public function getExpenseCategory() {
        return $this->belongsTo('App\Models\ExpenseCategory','income_category');
    }
}
