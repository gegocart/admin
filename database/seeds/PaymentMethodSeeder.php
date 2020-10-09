<?php

use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert(
        [
        	'user_id'=>3,
        	'card_type' => "Credit/Debit Card",
            'last_four' => "test",
            'is_active'=>false,
            'provider_id'=>'abc',
            'gateway_name'=>'credit-debit-card',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('payment_methods')->insert(
        [
        	'user_id'=>3,
        	'card_type' => "cash on delivery",
            'last_four' => "test",
            'is_active'=>true,
            'provider_id'=>'bcd',
            'gateway_name'=>'cod',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('payment_methods')->insert(
        [
            'user_id'=>3,
            'card_type' => "paytm",
            'last_four' => "test",
            'is_active'=>true,
            'provider_id'=>'paytm',
            'gateway_name'=>'paytm',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

          DB::table('payment_methods')->insert(
        [
            'user_id'=>3,
            'card_type' => "payU",
            'last_four' => "test",
            'is_active'=>false,
            'provider_id'=>'payu',
            'gateway_name'=>'payu',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);
    }
}
