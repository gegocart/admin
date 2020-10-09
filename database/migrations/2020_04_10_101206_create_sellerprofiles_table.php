<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellerprofiles', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('seller_name');
            $table->string('mobileno')->unique()->nullable();
            $table->string('email');
            $table->string('company_name')->nullable();
            $table->string('company_url')->nullable();
            $table->enum('status', ['not_approved', 'approved'])->default('not_approved');
            $table->string('aboutbusiness')->nullable();
            $table->string('pan_number')->nullable();
            $table->string('bankaccount_number')->nullable();
            $table->string('bankaccountdetail')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('sellerprofiles');
    }
}
