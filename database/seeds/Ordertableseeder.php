<?php

use Illuminate\Database\Seeder;

class Ordertableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('orders')->insert(
        [
        	'orderno'=>'OR#001',
        	'user_id' =>6,
            'address_id' => 1,
            'shipping_method_id'=>2,
            'status'=>'completed',
            'subtotal'=>'3400',
            'payment_method_id'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);//
    }
}
