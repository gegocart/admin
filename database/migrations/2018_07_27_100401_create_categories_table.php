<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('parent_id')->unsigned()->index()->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->integer('order')->unsigned()->index();
            $table->double('commission_fee', 50, 2)->default(0.00); //percentage,add column if sub category has fee category table as commission_fee
            $table->foreign('parent_id')->references('id')->on('categories');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
