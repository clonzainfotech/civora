<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePatientIdRoleIdCreatedByToUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->bigInteger('patient_id')->unsigned()->nullable(false)->change();
            $table->bigInteger('role_id')->unsigned()->nullable(false)->change();
            $table->integer('created_by')->unsigned()->nullable(false)->change();

            $table->foreign('patient_id')->references('id')->on('opd_patients');
            $table->foreign('role_id')->references('id')->on('review_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_reviews', function (Blueprint $table) {
            $table->string('patient_id')->change();
            $table->string('role_id')->change();
            $table->string('created_by')->change();

            $table->dropForeign(['patient_id', 'role_id']);
        });
    }
}
