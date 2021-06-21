<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSeenByToAncTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anc', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        Schema::table('anc_history', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        // IVF
        Schema::table('ivf', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        Schema::table('ivf_history', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        // IUI
        Schema::table('iui', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        Schema::table('iui_history', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
        // Gynec
        Schema::table('gynec', function (Blueprint $table) {
            $table->bigInteger('seen_by')->after('patients_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anc', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        Schema::table('anc_history', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        // IVF
        Schema::table('ivf', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        Schema::table('ivf_history', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        // IUI
        Schema::table('iui', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        Schema::table('iui_history', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
        // Gynec
        Schema::table('gynec', function (Blueprint $table) {
            $table->dropColumn(['seen_by']);
        });
    }
}
