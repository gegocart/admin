<?php

use Illuminate\Database\Seeder;

class ProductRatingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>1,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>6,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer1',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>1,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>7,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer2',
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>11,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>8,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer3',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>11,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>6,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer1',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>15,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>8,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer3',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>15,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>7,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer2',
            'rating'=>2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>16,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>6,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer1',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>16,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>7,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer2',
            'rating'=>1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>17,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>8,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer3',
            'rating'=>4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
        DB::table('rating_reviews')->insert(
        [
            'entity_id'=>19,  
            'entity_name' => 'App\Models\Product',
            'user_id'=>8,
            'title'=>'it is good',
            'description'=>'tester',
            'customer_name'=>'buyer3',
            'rating'=>3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);

    }
}
