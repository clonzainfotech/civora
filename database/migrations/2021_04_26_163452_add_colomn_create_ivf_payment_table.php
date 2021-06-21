<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColomnCreateIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('ivf_payment', function (Blueprint $table) {
            $table->renameColumn('remaining_payment', 'remaining_day');
            $table->string('remaining_payment')->change();
            $table->date('remaining_date')->nullable()->after('remaining_payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
