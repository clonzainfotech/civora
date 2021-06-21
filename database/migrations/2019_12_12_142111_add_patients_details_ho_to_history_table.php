<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientsDetailsHoToHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anc_history', function (Blueprint $table) {
            $table->longText('patients_details_ho')->nullable()->after('treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anc_history', function (Blueprint $table) {
            $table->dropColumn('patients_details_ho');
        });
    }
}
