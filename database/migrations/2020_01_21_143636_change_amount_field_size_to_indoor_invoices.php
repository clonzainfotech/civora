<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAmountFieldSizeToIndoorInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('indoor_invoices', function (Blueprint $table) {
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN reg_charge_amt reg_charge_amt FLOAT(10, 2) UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN blood_charge_amt blood_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN room_charge_amt room_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN other_charge_amt other_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN nursing_charges_amt nursing_charges_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN other_charge_amts other_charge_amts FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN visit_charges_amt visit_charges_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN form_total_amt form_total_amt FLOAT(12, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN op_charge_amt op_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN spvisit_charges_amt spvisit_charges_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN delivery_charge_amt delivery_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN medicine_charge_amt medicine_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN ot_charge_amt ot_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN discount_amt discount_amt FLOAT(12, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN labour_charge_amt labour_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN deposit_amt deposit_amt FLOAT(12, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN anaesthesia_charge_amt anaesthesia_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN biopys_charge_amt biopys_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN sonography_charge_amt sonography_charge_amt FLOAT(10, 2)  UNSIGNED");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN grand_total_amt grand_total_amt FLOAT(12, 2)  UNSIGNED");
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
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN reg_charge_amt reg_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN blood_charge_amt blood_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN room_charge_amt room_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN other_charge_amt other_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN nursing_charges_amt nursing_charges_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN other_charge_amts other_charge_amts FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN visit_charges_amt visit_charges_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN form_total_amt form_total_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN op_charge_amt op_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN spvisit_charges_amt spvisit_charges_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN delivery_charge_amt delivery_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN medicine_charge_amt medicine_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN ot_charge_amt ot_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN discount_amt discount_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN labour_charge_amt labour_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN deposit_amt deposit_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN anaesthesia_charge_amt anaesthesia_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN biopys_charge_amt biopys_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN sonography_charge_amt sonography_charge_amt FLOAT(8, 2)");
            DB::statement("ALTER TABLE indoor_invoices CHANGE COLUMN grand_total_amt grand_total_amt FLOAT(8, 2)");
        });
    }
}
