<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('min_weight')->nullable();//only whole numbers
            $table->integer('max_weight')->nullable();//only whole numbers
            $table->double('charge',10,2);
            $table->enum('scope',['local','national','regional'])->default('local');
            $table->enum('item_size',['standard','heavy','oversize'])->default('standard');
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
        Schema::dropIfExists('shipping_charges');
    }
}
