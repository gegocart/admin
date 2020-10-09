<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rating_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('entity_id')->nullable();
            $table->text('entity_name')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('rating')->nullable();
            $table->enum('status', ['not_approved', 'approved'])->default('not_approved');
            $table->integer('likes')->unsigned()->index()->nullable();
            $table->integer('dislikes')->unsigned()->index()->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->Integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rating_reviews');
    }
}
