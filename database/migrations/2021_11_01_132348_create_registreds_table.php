<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistredsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {




        Schema::create('registreds', function (Blueprint $table) {
            $table->id('idregitred');
            $table->unsignedBigInteger('idfirm');
            $table->foreign('idfirm')->references('id')->on('firms');
            $table->string('password');
            $table->boolean('active');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registreds');
    }
}
