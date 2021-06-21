<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCaExpenseNewFiledsInIndoorInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->float('txt_amount')->nullable()->after('bill_type');
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
        Schema::table('indoor_invoices', function (Blueprint $table) {
            //
        });
    }
}
