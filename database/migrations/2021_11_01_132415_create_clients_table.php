<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('idclient');
            $table->unsignedBigInteger('idfirm');
            $table->foreign('idfirm')->references('id')->on('firms');
            $table->unsignedBigInteger('idregitred');
            $table->foreign('idregitred')->references('idregitred')->on('registreds');

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
        Schema::dropIfExists('clients');
    }
}
