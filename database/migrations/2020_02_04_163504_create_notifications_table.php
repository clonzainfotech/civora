<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('user_type')->comment('0=Admin,1=Patients');
            $table->unsignedInteger('user_id');
            $table->tinyInteger('module')->comment('1=appointment,2=leave,3=anc,4=ivf,5=iui,6=event,7=opd,8=remind,9=payment');
            $table->longText('message')->nullable();
            $table->tinyInteger('status')->comment('0=unread,1=read')->default(0);
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
        Schema::dropIfExists('notifications');
    }
}
