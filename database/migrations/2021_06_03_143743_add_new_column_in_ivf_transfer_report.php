<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnInIvfTransferReport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_transfer_reports', function (Blueprint $table) {
            $table->longText('embryos_transferred_image')->default(null)->after('embryos_transferred');

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
