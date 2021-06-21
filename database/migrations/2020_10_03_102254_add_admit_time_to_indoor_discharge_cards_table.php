<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdmitTimeToIndoorDischargeCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->time('admit_time')->after('dos_date')->nullable();
            $table->time('discharge_time')->after('admit_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->dropColumn(['admit_time','discharge_time']);
        });
    }
}
