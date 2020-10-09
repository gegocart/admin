<?php

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>1
                       
        ]);

         DB::table('category_product')->insert(
        [
            'category_id' => 9,
            'product_id'=>2
                       
        ]);

          DB::table('category_product')->insert(
        [
            'category_id' => 20,
            'product_id'=>3
                       
        ]);

        DB::table('category_product')->insert(
        [
            'category_id' => 26,
            'product_id'=>4
                       
        ]);
        DB::table('category_product')->insert(
        [
            'category_id' => 28,
            'product_id'=>5
                       
        ]);
        DB::table('category_product')->insert(
        [
            'category_id' => 28,
            'product_id'=>6
                       
        ]);
        DB::table('category_product')->insert(
        [
            'category_id' => 28,
            'product_id'=>7
                       
        ]);
        DB::table('category_product')->insert(
        [
            'category_id' => 28,
            'product_id'=>8
                       
        ]);
         DB::table('category_product')->insert(
        [
            'category_id' => 29,
            'product_id'=>9
                       
        ]);
          DB::table('category_product')->insert(
        [
            'category_id' => 29,
            'product_id'=>10
                       
        ]);
           DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>11
                       
        ]); DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>12
                       
        ]); DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>13
                       
        ]); DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>14
                       
        ]); DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>15
                       
        ]); DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>16
                       
        ]);
         DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>17
                       
        ]);
          DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>18
                       
        ]);
           DB::table('category_product')->insert(
        [
            'category_id' => 8,
            'product_id'=>19
                       
        ]);
             DB::table('category_product')->insert(
        [
            'category_id' => 31,
            'product_id'=>20
                       
        ]);  DB::table('category_product')->insert(
        [
            'category_id' => 31,
            'product_id'=>21
                       
        ]);  DB::table('category_product')->insert(
        [
            'category_id' => 31,
            'product_id'=>22
                       
        ]);


    }
}
