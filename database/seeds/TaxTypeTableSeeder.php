<?php

use Illuminate\Database\Seeder;

class TaxTypeTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Electronics',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>5,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Clothes',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>5,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Furniture',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>5,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Toys',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>18,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Gift card',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>6,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

        DB::table( 'tax_type' )->insert( [
            'tax_name'=>'Others',
            'country_id'=>7,
            'country_code'=>'IN',
            'state_code'=>'',
            'zip_postcode'=>'',
            'city'=>'',
            'tax_rate'=>28,
            'status'=>true,
            'order'=>1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
        ] );

    }
}
