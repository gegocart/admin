<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('attributeset_id')->unsigned()->index();
            $table->foreign('attributeset_id')->references('id')->on('attributesets');
            $table->string('attribute_code')->nullable();
            $table->string('attribute_label')->nullable();
            $table->string('input_type')->nullable();
            $table->text('input_value')->nullable();
            $table->boolean('required')->nullable();
            $table->boolean('visible')->nullable();
            $table->boolean('searchable')->nullable();
            $table->boolean('filterable')->nullable();
            $table->boolean('comparable')->nullable();
            $table->boolean('variation')->default(false);
            $table->text('validation')->nullable();
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
        Schema::dropIfExists('attributes');
    }
}
