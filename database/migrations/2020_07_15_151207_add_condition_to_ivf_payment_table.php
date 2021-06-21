<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConditionToIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->bigInteger('payment')->nullable()->after('cycle_no');
            $table->bigInteger('package')->nullable()->after('payment');
            $table->tinyInteger('payment_type')->nullable()->after('package')->comment('1=card,2=cash');
            $table->bigInteger('created_by')->nullable()->after('time');
            $table->integer('visit')->nullable()->default(1)->after('created_by');
            $table->tinyInteger('is_completed')->nullable()->default(0)->after('visit')->comment('0=no,1=yes');
            $table->string('condition')->nullable()->after('is_completed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->dropColumn(['payment','package','payment_type','created_by','visit','is_completed','condition']);
        });
    }
}
