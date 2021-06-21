<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStichTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stich', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('patients_id')->unsigned()->nullable(false);
            $table->foreign('patients_id')->references('id')->on('patients')->onDelete('cascade');
            $table->bigInteger('created_by')->nullable();
            $table->longText('co')->nullable();
            $table->longText('ho')->nullable();
            $table->longText('oe')->nullable();
            $table->longText('treatment')->nullable();
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
        Schema::dropIfExists('stich');
    }
}
