<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOtherChargesToIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->string('husband_name')->nullable()->after('patients_id');
            $table->integer('sonography_charge')->nullable()->after('husband_name');
            $table->integer('ivf_lab_charge')->nullable()->after('sonography_charge');
            $table->integer('icsi_ivf_charge')->nullable()->after('ivf_lab_charge');
            $table->integer('embroy_tranfer')->nullable()->after('icsi_ivf_charge');
            $table->integer('embroy_freezing')->nullable()->after('embroy_tranfer');
            $table->integer('hystrocopy')->nullable()->after('embroy_freezing');
            $table->integer('medical_medicines')->nullable()->after('hystrocopy');
            $table->integer('unconscious_charge')->nullable()->after('medical_medicines');
            $table->integer('blood_report')->nullable()->after('unconscious_charge');
            $table->integer('tesa_pesa')->nullable()->after('blood_report');
            $table->integer('donor_charge')->nullable()->after('tesa_pesa');
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
            $table->dropColumn(['husband_name','sonography_charge','ivf_lab_charge','icsi_ivf_charge','embroy_tranfer','embroy_freezing','hystrocopy','medical_medicines','unconscious_charge','blood_report','tesa_pesa']);
        });
    }
}
