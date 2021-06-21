<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('salutation')->nullable();
            $table->string('name');
            $table->string('mobile_number')->nullable();
            $table->string('speciality')->nullable();
            $table->string('degree')->nullable();
            $table->string('residence_phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('clinic_name')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('pin')->nullable();
            $table->integer('state')->nullable();
            $table->string('clinic_phone_number')->nullable();
            $table->string('clinic_other_phone_number')->nullable();
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
        Schema::dropIfExists('reference_doctors');
    }
}
