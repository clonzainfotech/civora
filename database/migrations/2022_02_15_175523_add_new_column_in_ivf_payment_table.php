<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnInIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->string('patient_sign_image')->default(null)->nullable()->after('remark');
            $table->string('patient_relative_sign_image')->default(null)->nullable()->after('remark');
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
            //
        });
    }
}
