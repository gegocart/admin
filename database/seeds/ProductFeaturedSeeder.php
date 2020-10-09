<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class ProductFeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
           DB::table('product_featured')->insert(
    	[
    		 'product_id'=>'1', 
    		 'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
            DB::table('product_featured')->insert(
        [
             'product_id'=>'11', 
             'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
             'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
             DB::table('product_featured')->insert(
        [
             'product_id'=>'14', 
             'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
             'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
              DB::table('product_featured')->insert(
        [
             'product_id'=>'15', 
             'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
             'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
               DB::table('product_featured')->insert(
        [
             'product_id'=>'16', 
             'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
             'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]); DB::table('product_featured')->insert(
        [
             'product_id'=>'17', 
             'featured_start_datetime'=>date("Y-m-d H:i:s"), 
             'featured_end_datetime'=>date("Y-m-d H:i:s"), 
             'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
