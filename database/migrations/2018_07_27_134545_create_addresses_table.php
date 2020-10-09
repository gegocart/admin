<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('country_id')->unsigned()->index();
            $table->string('name');
            $table->string('firstname');
            $table->string('lastname');
            //$table->string('email');
            $table->string('mobileno');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->integer('city_id')->unsigned()->index()->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('state_id')->unsigned()->index()->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->string('postal_code');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->boolean('default')->default(false);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
