<?php

use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('regions')->insert(
        [
            'country_id'=>101,
            'regionname' => 'South_India_1',
            'state_id'=>'["35","31"]',
            'city_id'=>'["3124","3659","3912"]', //pondicherrychennai,madurai
            'seller_id'=>3,
            'delivered'=>5,
            'status' => 'active',
             'import_file_name'=>'',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
       DB::table('regions')->insert(
        [
            'country_id'=>101,
             'regionname' => 'South_India_2',
            'state_id'=>'["17"]',
            'city_id'=>'["1725","1668"]',//mangalore,kannur
            'seller_id'=>3,
            'delivered'=>5,
            'status' => 'active',
            'import_file_name'=>'',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
            //;DB::table('regions')->insert(
        // [
        //     'country_id'=>101,
        //     'name' => 'South India',
        //     'status' => 'active',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
           
        // ]);DB::table('regions')->insert(
        // [
        //     'country_id'=>101,
        //     'name' => 'West India',
        //     'status' => 'active',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
           
        // ]);
        // DB::table('regions')->insert(
        // [
        //     'country_id'=>101,
        //     'name' => 'Central India',
        //     'status' => 'active',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
           
        // ]);
        //  DB::table('regions')->insert(
        // [
        //     'country_id'=>101,
        //     'name' => 'North East India',
        //     'status' => 'active',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s"),
           
        // ]);


      

                


    

   }
}
