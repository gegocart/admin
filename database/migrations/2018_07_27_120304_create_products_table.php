<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('store_id')->unsigned()->index();
            $table->foreign('store_id')->references('id')->on('stores');
            $table->string('name');
            $table->integer('ratings')->unsigned()->default(0);
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->text('product_image')->nullable();
            $table->text('thumbnailimage')->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->double('weight', 30, 10)->default(0)->nullable();
            $table->integer('tax_id')->unsigned()->index();
            $table->foreign('tax_id')->references('id')->on('tax_type');
            $table->boolean('status')->default(true);
            $table->enum('type',['physical','giftcard','downloadable'])->default('physical');
            $table->timestamps();
            $table->timestamp('approved_at')->nullable();
            $table->Integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
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
        Schema::dropIfExists('products');
    }
}
