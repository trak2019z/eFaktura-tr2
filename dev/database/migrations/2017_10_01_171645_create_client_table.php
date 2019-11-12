<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('category')->nullable();
            $table->string('NIP')->nullable();;
            $table->string('name')->nullable();;
            $table->string('firstName');
            $table->string('lastName');
            $table->string('street')->nullable();
            $table->string('town');
            $table->string('postcode');
            $table->string('postcode_town')->nullable();
            $table->string('property_number');
            $table->string('phone_number')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
