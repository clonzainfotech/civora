<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnIsDirectDischargeAndIsFinalInvoiceToIndoorBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->integer('is_direct_discharge')->comment('0=no,1=yes')->default(0)->after('is_invoice');
            $table->integer('is_final_invoice')->comment('0=no,1=yes')->default(0)->after('is_direct_discharge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dropColumn(['is_direct_discharge','is_final_invoice']);
        });
    }
}
