<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropcolumnIvfPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->bigInteger('HMG_approx')->nullable()->after('ivf_lab_charge');
            $table->bigInteger('RFSH_approx')->nullable()->after('HMG');
            $table->bigInteger('GonalF_approx')->nullable()->after('RFSH');
            $table->bigInteger('medical_medicines_approx')->nullable()->after('icsi_ivf_charge');
            $table->bigInteger('blood_report_approx')->nullable()->after('anesthescis_doctor');
            $table->bigInteger('ovum_embryopooling_approx')->nullable()->after('tesa_pesa');
            $table->bigInteger('hystrocopy_approx')->nullable()->after('semen_freezing_charge');


           $table->dropColumn(['sonography_status', 'consulation_status','ivf_lab_status', 'gonadotropins_status','HMG_status', 'RFSH_status','Gonal_status', 'embryo_transfer_status','embryo_freezing_status', 'embryologist_charge_status','surgeon_charge_status', 'semen_freezing_status','hystrocopy_status', 'icsi_ivf_status','medical_medicines_status', 'unconscious_charge_status','anesthescis_doctor_status', 'blood_report_status','tesa_pesa_status', 'ovum_embryopooling_status','donor_charge_status', 'TBPCR_status','PAMP_status', 'ERA_status','emdomatrial_report', 'gonadotropins_injection','unconscious_charge']);
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
