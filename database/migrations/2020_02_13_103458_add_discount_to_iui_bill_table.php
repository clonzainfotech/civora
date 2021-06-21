<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDiscountToIuiBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('iui_bill', function (Blueprint $table) {
            $table->float('discount', 8, 2)->unsigned()->nullable(true)->after('iui');
            $table->tinyInteger('discount_in')->unsigned()->nullable(false)->after('discount')->comment('1=%,2=₹');
            $table->float('total')->unsigned()->nullable(true)->after('discount_in');
            $table->float('grand_total')->unsigned()->nullable(true)->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('iui_bill', function (Blueprint $table) {
            $table->dropColumn(['discount', 'discount_in', 'grand_total', 'total']);
        });
    }
}
