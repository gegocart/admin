<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rating_id')->unsigned()->index();
            $table->foreign('rating_id')->references('id')->on('rating_reviews');
            $table->text('imagepath')->nullable();
            $table->text('thumbnailimage')->nullable();
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
        Schema::dropIfExists('review_gallery');
    }
}
