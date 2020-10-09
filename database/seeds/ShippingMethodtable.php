<?php

use Illuminate\Database\Seeder;

class ShippingMethodtable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_methods')->insert(
        [
        	'name'=>"Free Shipping",
        	'price' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('shipping_methods')->insert(
        [
        	'name'=>"Manual Pickup",
        	'price' => 0,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);
    }
}
