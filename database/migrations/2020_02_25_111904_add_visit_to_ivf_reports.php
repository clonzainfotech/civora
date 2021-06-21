<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVisitToIvfReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_reports', function (Blueprint $table) {
            $table->tinyInteger('visit')->nullable(false)->after('cycle_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_reports', function (Blueprint $table) {
            $table->dropColumn('visit');
        });
    }
}
