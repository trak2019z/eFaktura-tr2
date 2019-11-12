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
			$table->string('number');
            $table->string('category');
            $table->string('NIP')->nullable();
            $table->string('name')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('street')->nullable();
            $table->string('town');
            $table->string('postcode');
            $table->string('postcode_town')->nullable();
            $table->string('property_number');
            $table->string('status');
            $table->integer('client_id')->unsigned()->nullable();
            $table->float('total_price')->unsigned()->nullable();
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


