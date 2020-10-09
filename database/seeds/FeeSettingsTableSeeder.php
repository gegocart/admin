<?php

use Illuminate\Database\Seeder;

class FeeSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('fee_settings')->insert(
    	[
    		 'min_amount'=>0,
    		 'max_amount'=>250,
    		 'fee'=>2.00,
    		 'type'=>'order',
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
    	
        DB::table('fee_settings')->insert(
    	[
    		 'min_amount'=>250,
    		 'max_amount'=>500,
    		 'fee'=>5.00,
    		 'type'=>'order',
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('fee_settings')->insert(
    	[
    		 'min_amount'=>500,
    		 'max_amount'=>1000,
    		 'fee'=>25.00,
    		 'type'=>'order',
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('fee_settings')->insert(
    	[
    		 'min_amount'=>1000,
    		 'max_amount'=>null,
    		 'fee'=>50.00,
    		 'type'=>'order',
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    }
}
