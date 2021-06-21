<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnToSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_setting', function (Blueprint $table) {
            $table->string('before_visits')->nullable();
            $table->string('after_visits')->nullable(); 
            $table->string('unpaid_opd')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('system_setting', function (Blueprint $table) {
            $table->dropColumn(['before_visits','after_visits','unpaid_opd']);
        });
    }
}
