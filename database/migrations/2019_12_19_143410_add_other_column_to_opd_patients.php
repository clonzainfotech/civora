<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnToOpdPatients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('opd_patients', function (Blueprint $table) {
            $table->string('code')->nullable()->after('id');
            $table->string('otp')->nullable()->after('created_by');
            $table->integer('is_verify')->comment('0=not verify,1=verify')->default('0')->after('otp');
            $table->string('token')->nullable()->after('is_verify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('opd_patients', function (Blueprint $table) {
            $table->dropColumn(['code','otp','m_h','is_verify','token']);
        });
    }
}
