<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('patient_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->string('role_id')->references('id')->on('review_roles')->onDelete('cascade');
            $table->integer('rate')->nullable();
            $table->integer('remark')->nullable();
            $table->integer('status')->comment('1=active,0=deactive')->default(1);
            $table->string('created_by')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reviews');
    }
}
