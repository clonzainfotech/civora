<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTotalAndTypeToIndoorDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->float('total')->nullable()->after('deposit_amt');
            $table->string('type')->nullable()->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->dropColumn(['total','type']);
        });
    }
}
