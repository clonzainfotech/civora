<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByToOpdPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opd_patients', function (Blueprint $table) {
            $table->tinyInteger('created_by')->nullable()->after('complain'); 
        });

        Schema::table('category', function (Blueprint $table) {
            $table->tinyInteger('created_by')->nullable()->after('status'); 
        });

        Schema::table('reference_doctors', function (Blueprint $table) {
            $table->tinyInteger('created_by')->nullable()->after('clinic_other_phone_number');
        });

        Schema::table('anc_history', function (Blueprint $table) {
            $table->tinyInteger('created_by')->nullable()->after('treatment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opd_patients', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('category', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('reference_doctors', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });

        Schema::table('anc_history', function (Blueprint $table) {
            $table->dropColumn('created_by');
        });
    }
}
