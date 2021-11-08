<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneArticleInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('one_article_invoices', function (Blueprint $table) {
            $table->id('idonearticle');
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->integer('quantity');
            $table->float('discount');
            $table->float('itemTax');
            $table->unsignedBigInteger('idinvoice');
            $table->foreign('idinvoice')->references('idinvoice')->on('invoices');
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
        Schema::dropIfExists('one_article_invoices');
    }
}
