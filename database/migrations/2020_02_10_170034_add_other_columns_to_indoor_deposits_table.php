<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnsToIndoorDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->bigInteger('reference_doctor_id')->unsigned()->after('admin_id')->nullable(true);
            $table->text('injection')->after('reference_doctor_id')->nullable(true);
            $table->tinyInteger('charge_type')->comment('1=Hormon,2=IVF,3=IUI,4=Indoor Deposit')->default(4)->nullable(false)->after('case_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indoor_deposits', function (Blueprint $table) {
            $table->dropColumn([
                'reference_doctor_id',
                'injection',
                'charge_type',
            ]);
        });
    }
}
