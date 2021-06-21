<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCaExpense extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ca_expenses', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('amount')->unsigned()->nullable(true);
            $table->longText('detail')->nullable(true);
            $table->bigInteger('invoice_no')->unsigned();
            $table->integer('bank_id');
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
        Schema::dropIfExists('ca_expenses');
    }
}
