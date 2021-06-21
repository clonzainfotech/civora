<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndoorInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indoor_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('booking_id');
            $table->string('reg_charge_desc')->nullable();
            $table->float('reg_charge_amt')->nullable();
            $table->string('blood_charge_desc')->nullable();
            $table->float('blood_charge_amt')->nullable();
            $table->string('room_charge_desc')->nullable();
            $table->float('room_charge_amt')->nullable();
            $table->string('other_charge_desc')->nullable();
            $table->float('other_charge_amt')->nullable();
            $table->string('nursing_charges_desc')->nullable();
            $table->float('nursing_charges_amt')->nullable();
            $table->string('other_charge_descs')->nullable();
            $table->float('other_charge_amts')->nullable();
            $table->string('visit_charges_desc')->nullable();
            $table->float('visit_charges_amt')->nullable();
            $table->float('form_total_amt')->nullable();
            $table->string('op_charge_desc')->nullable();
            $table->float('op_charge_amt')->nullable();
            $table->float('spvisit_charges_amt')->nullable();
            $table->string('delivery_charge_desc')->nullable();
            $table->float('delivery_charge_amt')->nullable();
            $table->float('medicine_charge_amt')->nullable();
            $table->string('ot_charge_desc')->nullable();
            $table->float('ot_charge_amt')->nullable();
            $table->float('discount_amt')->nullable();
            $table->string('labour_charge_desc')->nullable();
            $table->float('labour_charge_amt')->nullable();
            $table->float('deposit_amt')->nullable();
            $table->string('anaesthesia_charge_desc')->nullable();
            $table->float('anaesthesia_charge_amt')->nullable();
            $table->string('biopys_charge_desc')->nullable();
            $table->float('biopys_charge_amt')->nullable();
            $table->string('sonography_charge_desc')->nullable();
            $table->float('sonography_charge_amt')->nullable();
            $table->float('grand_total_amt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('indoor_invoices');
    }
}
