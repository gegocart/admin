<?php

use Illuminate\Database\Seeder;

class PincodeRegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600002',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600018',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600016',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600020',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600088',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '600087',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '605001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '605003',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

        DB::table('pincode_region')->insert(
        [
        	'region_id'=>1,
        	'pincode' => '605005',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

         DB::table('pincode_region')->insert(
        [
        	'region_id'=>2,
        	'pincode' => '574142',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

          DB::table('pincode_region')->insert(
        [
        	'region_id'=>2,
        	'pincode' => '574173',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

         DB::table('pincode_region')->insert(
        [
        	'region_id'=>2,
        	'pincode' => '670001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);

         DB::table('pincode_region')->insert(
        [
        	'region_id'=>2,
        	'pincode' => '670003',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
             
        ]);
    }
}
