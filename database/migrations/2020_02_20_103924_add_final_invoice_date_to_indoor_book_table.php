<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinalInvoiceDateToIndoorBookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dateTime('final_invoice_date')->nullable()->after('is_final_invoice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_books', function (Blueprint $table) {
            $table->dropColumn('final_invoice_date');
        });
    }
}
