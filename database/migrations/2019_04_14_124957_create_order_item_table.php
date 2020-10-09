<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('seller_id')->unsigned();
            $table->foreign('seller_id')->references('id')->on('users');
            $table->integer('buyer_id')->unsigned();
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->integer('product_id')->unsigned();
            //$table->foreign('product_id')->references('id')->on('products');
            $table->integer('product_variation_id')->unsigned();
            //$table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->double('price', 50, 2)->default(0);
            $table->integer('quantity');
            $table->integer('tax_id')->unsigned()->index();
           // $table->foreign('tax_id')->references('id')->on('tax_type');
            $table->double('producttaxrate', 50, 2)->default(0);
            $table->double('shippingtaxrate', 50, 2)->default(0);
            $table->double('shippingprice', 50, 2)->default(0);
            $table->text('productdetail')->nullable();
            $table->enum('status',['pending','processing','payment_failed','shipped','completed','refunded','cancel','hold','unhold'])->default('pending');
            $table->enum('type',['pending','processing','payment_failed','shipped','completed','refunded'])->default('pending');
            $table->text('to_email')->nullable();
            $table->text('message')->nullable();
            $table->text('from')->nullable();
            $table->softDeletes();
            $table->integer('card_image')->unsigned()->nullable();
            //$table->foreign('card_image')->references('id')->on('product_galleries');
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
        Schema::dropIfExists('order_product');
    }
}
