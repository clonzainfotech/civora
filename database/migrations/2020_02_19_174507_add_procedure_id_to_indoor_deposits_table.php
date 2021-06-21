<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProcedureIdToIndoorDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->string('procedure_id')->nullable()->after('reference_doctor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->dropColumn('procedure_id');
        });
    }
}
