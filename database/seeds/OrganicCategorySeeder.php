<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganicCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
             'name'=>"Grocery & Staples",
             'slug'=>"grocery-staples",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);

        DB::table('categories')->insert([
             'name'=>"Readymade Mix",
             'slug'=>"readymade-mix",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);

        DB::table('categories')->insert([
             'name'=>"Sweet & Snacks",
             'slug'=>"sweet-snacks",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);

        DB::table('categories')->insert([
             'name'=>"Personal Care",
             'slug'=>"personal care",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);

        DB::table('categories')->insert([
             'name'=>"Contact Us",
             'slug'=>"contact-us",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);

         $grocery =  ['Dals & Pulses','Masala & Spices','Rice & Millets','Salt,Sugar, & Jaggery','Oil,Ghee, and Honey','Papads & Vadagams','Pickles & Sauces','Dry Fruits & Nuts','Atta & Other Flours','Noodles & Vermicelli','Beverages'];
        
        foreach ($grocery as $item) {
                DB::table('categories')->insert([
                'name'=>$item,
                'slug'=>Str::slug($item),
                //'status'=>"1",
                'parent_id'=>"1",
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"), 
                'order'=>'5'
                ]);
            }

            $readymade =  ['Dosa Mix','Puttu Mix','Idyappam Mix','Pongal Mix','Health Mix','Koozh Mix','Kali Mix','Pakoda Mix'];
        
	        foreach ($readymade as $item) {
	                DB::table('categories')->insert([
	                'name'=>$item,
	                'slug'=>Str::slug($item),
	                //'status'=>"1",
	                'parent_id'=>"2",
	                'created_at' => date("Y-m-d H:i:s"),
	                'updated_at' => date("Y-m-d H:i:s"), 
	                'order'=>'5'
	                ]);
	            }

	           $sweet =  ['Sweets','Mittai','Cookies & Candies','Namkeens'];
        
		        foreach ($sweet as $item) {
		                DB::table('categories')->insert([
		                'name'=>$item,
		                'slug'=>Str::slug($item),
		                //'status'=>"1",
		                'parent_id'=>"3",
		                'created_at' => date("Y-m-d H:i:s"),
		                'updated_at' => date("Y-m-d H:i:s"), 
		                'order'=>'5'
		                ]);
		            }


	       $personal =  ['Bath & Body','Hair Care','Skin Care','Health & Wellness'];
        
		        foreach ($personal as $item) {
		                DB::table('categories')->insert([
		                'name'=>$item,
		                'slug'=>Str::slug($item),
		                //'status'=>"1",
		                'parent_id'=>"4",
		                'created_at' => date("Y-m-d H:i:s"),
		                'updated_at' => date("Y-m-d H:i:s"), 
		                'order'=>'5'
		                ]);
		            }
                       DB::table('categories')->insert([
             'name'=>"Giftcard",
             'slug'=>"giftcard",
            // 'status'=>"1",
             'parent_id'=>null,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'order'=>'1'
        ]);
    }
}
