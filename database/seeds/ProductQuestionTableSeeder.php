<?php

use Illuminate\Database\Seeder;

class ProductQuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productquestions')->insert(
        [
            'buyer_id' => 6,
            'seller_id' => 3,
            'product_id'=>1,
            'question'=>"Any Other colors?",
              'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
                       
        ]);
        DB::table('productquestions')->insert(
        [
            'buyer_id' => 6,
            'seller_id' => 3,
            'product_id'=>1,
            'question'=>"it is support otg",
              'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
                       
        ]);
       
       

       
    }
}
