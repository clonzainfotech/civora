<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class ExpenseManager extends BaseModel
{
    protected $table = 'expense_manager';

    public function getUser() {
        return $this->belongsTo('App\User','created_by');
    }
    public function getExpenseCategory() {
        return $this->belongsTo('App\Models\ExpenseCategory','expense_category');
    }
    public function getPatient() {
        return $this->belongsTo('App\Models\OpdPatients','patients_id');
    }
    public function getAmountCategoryWise()
    {
        $sum = ExpenseManager::where([
            'expense_category' => $this->expense_category,
        ])
        ->sum('amount');
        return $sum;
    }
}
