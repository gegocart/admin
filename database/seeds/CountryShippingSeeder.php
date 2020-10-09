<?php

use Illuminate\Database\Seeder;

class CountryShippingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('country_shipping_method')->insert(
        [
        	'country_id'=>101,
        	'shipping_method_id' => 1,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
                         
        ]);

        DB::table('country_shipping_method')->insert(
        [
        	'country_id'=>8,
        	'shipping_method_id' => 2,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
                         
        ]);
    }
}
