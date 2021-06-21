<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnNursingChargeAndDrVisitChargeToIndoorTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_types', function (Blueprint $table) {
            $table->float('nursing_charge')->after('price');
            $table->float('dr_visit_charge')->after('nursing_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_types', function (Blueprint $table) {
            $table->dropColumn(['nursing_charge','dr_visit_charge']);
        });
    }
}
