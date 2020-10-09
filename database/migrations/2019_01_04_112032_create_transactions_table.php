<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->index()->nullable();
           // $table->foreign('order_id')->references('id')->on('orders');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
          
            $table->enum('type', ['credit','debit'])->default('credit');
            $table->enum('status', ['pending', 'approve','processing','payment_failed','completed','refunded','shipped','cancel'])->nullable();
            $table->string('action')->nullable();
            $table->double('amount', 50, 2)->default(0);
           // $table->integer('accounting_code_id')->unsigned()->nullable();
           // $table->foreign('accounting_code_id')->references('accounting_code')->on('accounting_codes');
           $table->text('request')->nullable();
           $table->text('response')->nullable();
           $table->date('transaction_date')->nullable();
           $table->text('transaction_id')->nullable();
           $table->text('comment')->nullable();
           $table->integer('entity_id')->nullable();
           $table->text('entity_name')->nullable();
           $table->double('balance_before', 50, 2)->default(0);
           $table->double('balance_after', 50, 2)->default(0);
           // $table->integer('total');
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
        Schema::dropIfExists('transactions');
    }
}
