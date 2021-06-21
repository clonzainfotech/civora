<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaExpenseNewFiledsInIncomeManager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('income_manager', function (Blueprint $table) {
            $table->float('txt_amount')->nullable()->after('income_category');
            $table->string('invoice_no')->nullable()->after('txt_amount');
            $table->Integer('bank_id')->nullable()->after('invoice_no');
            $table->string('detail')->nullable()->after('bank_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('income_manager', function (Blueprint $table) {
            //
        });
    }
}
