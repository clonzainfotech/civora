<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedByToIvfPlanReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_plan_report', function (Blueprint $table) {
            $table->integer('created_by')->after('cycle_no')->nullable();
        });
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->integer('created_by')->after('booking_id')->nullable();
        });
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->integer('created_by')->after('patient_id')->nullable();
        });
        Schema::table('ivf_reports', function (Blueprint $table) {
            $table->integer('created_by')->after('patients_id')->nullable();
        });
        Schema::table('event', function (Blueprint $table) {
            $table->integer('created_by')->after('status')->nullable();
        });
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->integer('created_by')->after('booking_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_plan_report', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
        Schema::table('ivf_reports', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
        Schema::table('event', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
        Schema::table('indoor_discharge_cards', function (Blueprint $table) {
            $table->dropColumn(['created_by']);
        });
    }
}
