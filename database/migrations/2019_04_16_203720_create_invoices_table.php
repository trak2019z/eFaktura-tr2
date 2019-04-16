<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('client_id')->unsigned()->nullable();
            $table->string('NIP')->nullable();
            $table->string('company');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('street')->nullable();
            $table->string('town');
            $table->string('postcode');
            $table->string('property_number');
            $table->string('number');
            $table->string('payment_form');
            $table->integer('status');
            $table->string('product');
            $table->string('order');
            $table->double('price');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('set null');
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
