<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPaymentModeToIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->integer('payment_mode')->comment('1=card 2=cash')->after('grand_total_amt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_invoices', function (Blueprint $table) {
            $table->dropColumn('payment_mode');
        });
    }
}
