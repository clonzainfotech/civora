<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNursingChargeAndDrVisitChargeToIndoorTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_types', function (Blueprint $table) {
            $table->float('nursing_charge')->nullable(true)->change();
            $table->float('dr_visit_charge')->nullable(true)->change();
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
            $table->float('nursing_charge')->nullable(false)->change();
            $table->float('dr_visit_charge')->nullable(false)->change();
        });
    }
}
