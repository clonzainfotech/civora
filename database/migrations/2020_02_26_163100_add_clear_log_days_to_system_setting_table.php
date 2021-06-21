<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClearLogDaysToSystemSettingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('system_setting', function (Blueprint $table) {
            $table->integer('clear_logs_day')->nullable()->after('linked_in_link');
            $table->string('adv_video')->nullable()->after('clear_logs_day');
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
            $table->dropColumn(['clear_logs_day','adv_video']);
        });
    }
}
