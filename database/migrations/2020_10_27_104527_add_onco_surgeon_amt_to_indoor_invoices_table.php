<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOncoSurgeonAmtToIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->float('onco_surgeon_amt')->after('ot_charge_amt')->nullable();
            $table->string('onco_surgeon_desc')->after('onco_surgeon_amt')->nullable();
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
            $table->dropColumn(['onco_surgeon_desc','onco_surgeon_amt']);
        });
    }
}
