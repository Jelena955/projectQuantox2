<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('idinvoice');
            $table->unsignedBigInteger('idregitred');
            $table->foreign('idregitred')->references('idregitred')->on('registreds');
            $table->unsignedBigInteger('idclient');
            $table->foreign('idclient')->references('idclient')->on('clients');
            $table->date('dateOfIssue');
            $table->date('DueDate');
            $table->unsignedBigInteger('idstatus');
            $table->foreign('idstatus')->references('idstatus')->on('statuses');
            $table->float('invTax');
            $table->float('paid');
            $table->string('notes');
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
        Schema::dropIfExists('invoices');
    }
}
