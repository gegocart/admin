<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('product_variation_id')->unsigned()->index();
            $table->integer('quantity')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_variation_id')->references('id')->on('product_variations');
            $table->string('to_email')->nullable();
            $table->string('message')->nullable();
            $table->string('from_mail')->nullable();
            $table->integer('card_image')->unsigned()->nullable();
            $table->foreign('card_image')->references('id')->on('products');
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
        Schema::dropIfExists('cart_user');
    }
}
