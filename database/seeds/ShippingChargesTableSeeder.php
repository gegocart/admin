<?php

use Illuminate\Database\Seeder;

class ShippingChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>0,
    		 'max_weight'=>500, //gms
    		 'charge'=>38.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>500,
    		 'max_weight'=>1000, //kg
    		 'charge'=>16.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //kg
    		 'max_weight'=>null, //kg
    		 'charge'=>10.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>0, //kg
    		 'max_weight'=>500, //kg
    		 'charge'=>46.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>500, //gms
    		 'max_weight'=>1000, //kg
    		 'charge'=>21.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //kg
    		 'max_weight'=>null, //kg
    		 'charge'=>15.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>0, //gms
    		 'max_weight'=>500, //gms
    		 'charge'=>66.00,
    		 'scope'=>'national', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>500, //gms
    		 'max_weight'=>1000, //kg
    		 'charge'=>25.00,
    		 'scope'=>'national', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //kg
    		 'max_weight'=>null, //kg
    		 'charge'=>20.00,
    		 'scope'=>'national', //'local','national','regional'
    		 'item_size'=>'standard', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);




        //oversize
    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000,//kgs
    		 'max_weight'=>5000, //kgs
    		 'charge'=>101.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>5000,
    		 'max_weight'=>null, //kg
    		 'charge'=>10.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);


    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //kg
    		 'max_weight'=>5000, //kg
    		 'charge'=>116.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>5000, // 5 kg
    		 'max_weight'=>null, //5kg
    		 'charge'=>11.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //1 kg
    		 'max_weight'=>5000, //5kg
    		 'charge'=>166.00,
    		 'scope'=>'national', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>5000, //5kg
    		 'max_weight'=>null, //10kg
    		 'charge'=>14.00,
    		 'scope'=>'national', //'local','national','regional'
    		 'item_size'=>'oversize', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);



        //heavy
    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000,//kgs
    		 'max_weight'=>12000, //kgs
    		 'charge'=>241.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'heavy', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>12000,
    		 'max_weight'=>null, //kg
    		 'charge'=>3.00,
    		 'scope'=>'local', //'local','national','regional'
    		 'item_size'=>'heavy', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);


    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>1000, //kg
    		 'max_weight'=>12000, //kg
    		 'charge'=>241.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'heavy', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('shipping_charges')->insert(
    	[
    		 'min_weight'=>12000, //gms
    		 'max_weight'=>null, //kg
    		 'charge'=>4.00,
    		 'scope'=>'regional', //'local','national','regional'
    		 'item_size'=>'heavy', //'standard','heavy','oversize'
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);


    	
    }
}
