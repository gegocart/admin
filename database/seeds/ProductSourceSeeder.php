<?php

use Illuminate\Database\Seeder;

class ProductSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('product_source')->insert(
        [
            'product_id'=>20,
            'slug'=>'computer-book',
            'source'=>"uploads/source/computer.pdf",       
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
         DB::table('product_source')->insert(
        [
            'product_id'=>21,
            'slug'=>'maths-book',
            'source'=>"uploads/source/maths.pdf",       
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('product_source')->insert(
        [
            'product_id'=>22,
            'slug'=>'sceince-book',
            'source'=>"uploads/source/science.pdf",         
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    
    }
}
