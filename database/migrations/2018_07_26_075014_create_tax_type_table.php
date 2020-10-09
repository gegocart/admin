<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tax_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tax_name');
            $table->integer('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->string('country_code')->nullable();
            $table->string('state_code')->nullable();
            $table->string('zip_postcode')->nullable();
            $table->string('city')->nullable();
            $table->biginteger('tax_rate');
            $table->boolean('status')->default(true);
            $table->integer('order')->unsigned()->index();
            $table->timestamps();
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
        Schema::dropIfExists('tax_type');
    }
}
