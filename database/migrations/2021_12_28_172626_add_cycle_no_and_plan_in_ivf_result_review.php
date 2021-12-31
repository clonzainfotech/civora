<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCycleNoAndPlanInIvfResultReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_result_reviews', function (Blueprint $table) {
            $table->integer('plan')->after('patients_id');
            $table->integer('cycle_no')->after('patients_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_result_reviews', function (Blueprint $table) {
            //
        });
    }
}
