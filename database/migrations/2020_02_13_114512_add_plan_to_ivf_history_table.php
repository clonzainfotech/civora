<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlanToIvfHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_history', function (Blueprint $table) {
            $table->tinyInteger('plan')->comment('1=Pick Up,2=FET,3=FET-OD,4=FET-ED')->after('created_by')->default(1);
            $table->tinyInteger('cycle_no')->after('plan')->nullable();
            $table->tinyInteger('cycle_status')->comment('0=pending,1=active,2=finished')->after('cycle_no')->default(0)->nullable();
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
            $table->dropColumn(['plan','cycle_no','cycle_status']);
        });
    }
}
