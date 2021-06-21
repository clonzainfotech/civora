<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnOpChargeDescsAndOpChargeAmtsToIndoorInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->string('op_charge_descs')->nullable()->after('op_charge_amt');
            $table->float('op_charge_amts')->nullable()->after('op_charge_descs');
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
            $table->dropColumn(['op_charge_descs','op_charge_amts']);
        });
    }
}
