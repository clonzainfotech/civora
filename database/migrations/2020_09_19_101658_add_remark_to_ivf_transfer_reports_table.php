<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarkToIvfTransferReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_transfer_reports', function (Blueprint $table) {
            $table->longText('remark')->after('fertilization_procedure')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_transfer_reports', function (Blueprint $table) {
            $table->dropColumn(['remark']);
        });
    }
}
