<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEmbryosTransferredImageFieldsInIvfTransferReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_transfer_reports', function (Blueprint $table) {
            $table->longText('embryos_transferred_image')->nullable(true)->change();
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
            //
        });
    }
}
