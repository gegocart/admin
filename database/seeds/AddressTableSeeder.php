<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('addresses')->insert([
			'user_id'=>3,
			'country_id'=>1,
			'name'=>'shipping_address',
			'firstname'=>'test',
			'lastname'=>'',
			//'email'=>'',
			'address_1'=>'Flat No. 100,Triveni Apartments',
			'address_2'=>'',
		    'mobileno'=>'',
			'city_id'=>12,
			'state_id'=>35,
      		'postal_code'=>887986,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s"),
        ]);


        DB::table('addresses')->insert([
			'user_id'=>6,
			'country_id'=>7,
			'name'=>'billing_address',
			'firstname'=>'test',
			'lastname'=>'',
			//'email'=>'',
			'address_1'=>'XYZ Example Exports,Post Office Box 924',
			'address_2'=>'',
			'mobileno'=>'',
			'city_id'=>12,
			'state_id'=>35,
			'postal_code'=>676575,
			'created_at' => date("Y-m-d H:i:s"),
			'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
