<?php

use Illuminate\Database\Seeder;

class Attributecodeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributecodes')->insert([
         	'code'=>'No Variation',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('attributecodes')->insert([
         	'code'=>'Color',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('attributecodes')->insert([
         	'code'=>'Display Size',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('attributecodes')->insert([
         	'code'=>'Storage',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('attributecodes')->insert([
         	'code'=>'Weight',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('attributecodes')->insert([
         	'code'=>'Size',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

         DB::table('attributecodes')->insert([
         	'code'=>'Price',
         	'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
             
        ]);
    }
}
