<?php

use Illuminate\Database\Seeder;

class AttributeCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
               
            DB::table('attributeset_category')->insert([
         	'attributeset_id'=>'2',
         	'category_id'=>'8',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

            DB::table('attributeset_category')->insert([
         	'attributeset_id'=>'8',
         	'category_id'=>'9',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

            DB::table('attributeset_category')->insert([
         	'attributeset_id'=>'7',
         	'category_id'=>'20',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);


        DB::table('attributeset_category')->insert([
            'attributeset_id'=>'9',
            'category_id'=>'28',
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);
        
          DB::table('attributeset_category')->insert([
            'attributeset_id'=>'5',
            'category_id'=>'26',
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

      DB::table('attributeset_category')->insert([
            'attributeset_id'=>'10',
            'category_id'=>'31',
            'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        // DB::table('attributeset_category')->insert([
        //     'attributeset_id'=>'11',
        //     'category_id'=>'32',
        //     'created_at' => date("Y-m-d H:i:s"),
        //      'updated_at' => date("Y-m-d H:i:s"),
             
        // ]);

           
    }
}
