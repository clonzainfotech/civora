<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBillTypeToIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->tinyInteger('bill_type')->default('1')->comment('1=normal,2=package')->after('payment_mode');
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
            $table->dropColumn(['bill_type']);
        });
    }
}
