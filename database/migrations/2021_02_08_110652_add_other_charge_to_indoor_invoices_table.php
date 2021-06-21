<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherChargeToIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->float('third_other_charge_amt')->nullable()->after('sonography_charge_amt');
            $table->string('third_other_charge_desc')->nullable()->after('third_other_charge_amt');
            $table->float('fourth_other_charge_amt')->nullable()->after('third_other_charge_desc');
            $table->string('fourth_other_charge_desc')->nullable()->after('fourth_other_charge_amt');
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
            $table->dropColumn(['third_other_charge_amt','third_other_charge_desc','fourth_other_charge_amt','fourth_other_charge_desc']);
        });
    }
}
