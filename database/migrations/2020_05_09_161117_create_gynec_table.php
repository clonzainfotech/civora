<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGynecTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gynec', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned();
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->longText('ho')->nullable();
            $table->longText('co')->nullable();
            $table->longText('oh')->nullable();
            $table->longText('mh')->nullable();
            $table->longText('patients_details_ho')->nullable();
            $table->longText('oe')->nullable();
            $table->longText('plan_of_management')->nullable();
            $table->longText('investigation')->nullable();
            $table->longText('treatment')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('gynec');
    }
}
