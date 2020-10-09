<?php

use Illuminate\Database\Seeder;

class ProductAnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productanswers')->insert(
        [
            'question_id' => 1,
            'product_id'=>1,
            'seller_id'=>3,
            'buyer_id'=>6,
            'answer'=>"green",
            'visibility'=>"public",
            'status'=>"approve",
            'likes'=>1,
            'dislikes'=>1,
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'approved_at' => date("Y-m-d H:i:s"),
             'approved_by' =>1,
                       
        ]);

        DB::table('productanswers')->insert(
        [
            'question_id' => 2,
            'product_id'=>1,
            'seller_id'=>3,
            'buyer_id'=>6,
            'answer'=>"yes",
            'visibility'=>"public",
            'status'=>"approve",
            'likes'=>3,
            'dislikes'=>3,
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             'approved_at' => date("Y-m-d H:i:s"),
             'approved_by' =>1,
                       
        ]);
           
       
        
    }
}
