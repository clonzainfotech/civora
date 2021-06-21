<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class AddNewcolomnToIvfPayamentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ivf_payment', function (Blueprint $table) {
            $table->date('date')->nullable()->after('husband_name');
            $table->string('sonography_status')->nullable()->after('sonography_charge');
            $table->bigInteger('consulation')->nullable()->after('sonography_status');
            $table->string('consulation_status')->nullable()->after('consulation');
            $table->string('ivf_lab_status')->nullable()->after('ivf_lab_charge');
            $table->string('gonadotropins_injection')->nullable()->after('ivf_lab_status');
            $table->string('gonadotropins_status')->nullable()->after('gonadotropins_injection');
            $table->string('embryo_transfer_status')->nullable()->after('embroy_tranfer');
            $table->string('embryo_freezing_status')->nullable()->after('embroy_freezing');
            $table->bigInteger('embryologist_charge')->nullable()->after('embryo_freezing_status');
            $table->string('embryologist_charge_status')->nullable()->after('embryologist_charge');
            $table->bigInteger('surgeon_charge')->nullable()->after('embryologist_charge_status');
            $table->string('surgeon_charge_status')->nullable()->after('surgeon_charge');
            $table->bigInteger('semen_freezing_charge')->nullable()->after('surgeon_charge_status');
            $table->string('semen_freezing_status')->nullable()->after('semen_freezing_charge');
            $table->string('hystrocopy_status')->nullable()->after('hystrocopy');
            $table->string('icsi_ivf_status')->nullable()->after('icsi_ivf_charge');
            $table->string('medical_medicines_status')->nullable()->after('medical_medicines');
            $table->string('unconscious_charge_status')->nullable()->after('unconscious_charge');
            $table->bigInteger('anesthescis_doctor')->nullable()->after('unconscious_charge_status');
            $table->string('anesthescis_doctor_status')->nullable()->after('anesthescis_doctor');
            $table->string('blood_report_status')->nullable()->after('blood_report');
            $table->string('tesa_pesa_status')->nullable()->after('tesa_pesa');
            $table->string('ovum_embryopooling')->nullable()->after('tesa_pesa_status');
            $table->string('ovum_embryopooling_status')->nullable()->after('ovum_embryopooling');
            $table->string('language')->nullable()->comment('1=gujarati,2=hindi,3=english')->after('ovum_embryopooling_status');
            $table->string('cycle_type')->nullable()->after('cycle_no');
            $table->bigInteger('donor_charge')->nullable()->after('cycle_type');
            $table->string('donor_charge_status')->nullable()->after('donor_charge');
            $table->string('emdomatrial_report')->nullable()->after('donor_charge_status');
            $table->bigInteger('TBPCR')->nullable()->after('emdomatrial_report');
            $table->string('TBPCR_status')->nullable()->after('TBPCR');
            $table->bigInteger('PAMP')->nullable()->after('TBPCR_status');
            $table->string('PAMP_status')->nullable()->after('PAMP');
            $table->bigInteger('ERA')->nullable()->after('PAMP_status');
            $table->string('ERA_status')->nullable()->after('ERA');
            $table->bigInteger('extra_charge')->nullable()->after('package');
            $table->bigInteger('discount')->nullable()->after('extra_charge');
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
            $table->dropColumn(['date','sonography_status','consulation','consulation_status','ivf_lab_status','gonadotropins_injection','gonadotropins_status','embryo_transfer_status','embryo_freezing_status','embryo_freezing_status','embryologist_charge','embryologist_charge_status','surgeon_charge','surgeon_charge_status','semen_freezing_charge','semen_freezing_status','hystrocopy_status','icsi_ivf_status','medical_medicines_status','unconscious_charge_status','anesthescis_doctor','anesthescis_doctor_status','blood_report_status','tesa_pesa_status','ovum_embryopooling','ovum_embryopooling_status','language','cycle_type','donor_charge','donor_charge_status','emdomatrial_report','TBPCR','TBPCR_status','PAMP','PAMP_status','ERA','ERA_status','extra_charge','discount']);
        });
    }
}