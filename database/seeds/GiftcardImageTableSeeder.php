<?php

use Illuminate\Database\Seeder;

class GiftcardImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>27, 
    		 'path'=>'uploads/images/giftcard.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>27, 
    		 'path'=>'uploads/images/giftcard2.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>27, 
    		 'path'=>'uploads/images/giftcard3.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>28, 
    		 'path'=>'uploads/images/giftcard4.png', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>28, 
    		 'path'=>'uploads/images/giftcard4.png', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>28, 
    		 'path'=>'uploads/images/giftcard4.png', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
         DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>29, 
    		 'path'=>'uploads/images/giftcard5.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
          DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>29, 
    		 'path'=>'uploads/images/giftcard5.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
           DB::table('giftcard_images')->insert(
    	[
    		 'category_id'=>29, 
    		 'path'=>'uploads/images/giftcard5.jpg', //double
    		 'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
    	]);
    }
}
