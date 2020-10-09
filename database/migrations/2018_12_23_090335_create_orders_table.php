<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderno');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('address_id')->unsigned()->index()->nullable();
            $table->integer('shipping_method_id')->unsigned()->index()->nullable();
            $table->integer('giftorder_id')->unsigned()->nullable();
            $table->enum('status',['pending','processing','payment_failed','shipped','completed','refunded','cancel','hold','unhold'])->default('pending');
            $table->integer('subtotal');
            $table->integer('payment_method_id')->unsigned()->index();
           
            $table->timestamps();
           
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
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
        Schema::dropIfExists('orders');
    }
}
