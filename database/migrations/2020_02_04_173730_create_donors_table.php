<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned()->nullable(false);
            $table->foreign('patients_id')->references('id')->on('opd_patients')->onDelete('cascade');
            $table->string('face_color')->nullable(true);
            $table->string('hair_color')->nullable(true);
            $table->string('eye_color')->nullable(true);
            $table->string('blood_group', 3)->nullable(true);
            $table->string('cbc_mp')->nullable(true);
            $table->string('urine')->nullable(true);
            $table->string('rbs')->nullable(true);
            $table->tinyInteger('hiv')->nullable(true)->comment('0=Negative, 1=Positive');
            $table->tinyInteger('hbsag')->nullable(true)->comment('0=Negative, 1=Positive');
            $table->tinyInteger('vdrl')->nullable(true)->comment('0=Negative, 1=Positive');
            $table->tinyInteger('is_aadhar')->nullable(true)->comment('0=No, 1=Yes');
            $table->text('aadhar_image')->nullable(true);
            $table->string('image')->nullable(true);
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
        Schema::dropIfExists('donors');
    }
}
