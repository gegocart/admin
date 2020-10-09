<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaytmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paytm', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mid')->nullable();
            $table->string('website')->nullable();
            $table->string('industrytype')->nullable();
            $table->string('channelid')->nullable();
            $table->string('orderid')->nullable();
            $table->string('custid')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('email')->nullable();
            $table->string('amt')->nullable();
            $table->string('callbackurl')->nullable();
            $table->string('url')->nullable();
            $table->text('checksum')->nullable();
            $table->text('request')->nullable();
            $table->text('response')->nullable();
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
        Schema::dropIfExists('paytm');
    }
}
