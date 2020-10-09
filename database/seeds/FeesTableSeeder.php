<?php

use Illuminate\Database\Seeder;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fees')->insert(
    	[
    		 'user_id'=>3, 
    		 'fee'=>2, //double
    		 'status'=>'approve',//'pending', 'approve', 'cancel','refund'
    		 'action'=>'cod', 
    		 'entity_id'=>'1', 
    		 'entity_name'=>'order_item', 
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	DB::table('fees')->insert(
    	[
    		 'user_id'=>3, 
    		 'fee'=>50, //double
    		 'status'=>'approve',//'pending', 'approve', 'cancel','refund'
    		 'action'=>'cod', 
    		 'entity_id'=>'1', 
    		 'entity_name'=>'order_item', 
    		'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);

    	
    }
}
