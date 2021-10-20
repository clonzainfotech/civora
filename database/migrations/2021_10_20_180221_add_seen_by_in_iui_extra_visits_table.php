<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSeenByInIuiExtraVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iui_extra_visits', function (Blueprint $table) {
            $table->integer('seen_by')->after('patient_id');
            $table->integer('rmo_doctor')->nullable()->after('seen_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iui_extra_visits', function (Blueprint $table) {
            //
        });
    }
}
