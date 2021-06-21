<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLscsOperationChargeToIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->float('lscs_operation_charge', 8,2)->unsigned()->nullable(true)->after('op_charge_amts');
            $table->string('lscs_operation_charge_description')->nullable(true)->after('lscs_operation_charge');
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
            $table->dropColumn(['lscs_operation_charge', 'lscs_operation_charge_description']);
        });
    }
}
