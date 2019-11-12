<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned()->nullable();
            $table->double('product_count');
            $table->double('price');
            $table->string('item');

            $table->foreign('invoice_id')->references('id')->on('invoices');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_positions');
    }
}
