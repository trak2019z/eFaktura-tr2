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
            $table->increments('id');
            $table->string('category');
            $table->string('NIP')->nullable();;
            $table->string('company')->nullable();;
            $table->string('firstName');
            $table->string('lastName');
            $table->string('street')->nullable();
            $table->string('town');
            $table->string('postcode');
            $table->string('postcode_town');
            $table->string('property_number');
            $table->string('number');
            $table->string('payment_form');
            $table->integer('status');
            $table->integer('client_id')->unsigned()->nullable();
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


