<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyBillExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_bill_expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('month');
            $table->integer('expense_category');
            $table->integer('bill_amount');
            $table->integer('apply_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_bill_expenses');
    }
}
