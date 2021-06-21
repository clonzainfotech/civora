<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTriggerDateAndTimeToIvfHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_history', function (Blueprint $table) {
            $table->date('trigger_date')->nullable()->after('description');
            $table->time('trigger_time')->nullable()->after('trigger_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_history', function (Blueprint $table) {
            $table->dropColumn(['trigger_date','trigger_time']);
        });
    }
}
