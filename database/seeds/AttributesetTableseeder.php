<?php

use Illuminate\Database\Seeder;

class AttributesetTableseeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {

        DB::table( 'attributesets' )->insert( [
            'name'=>'Standard',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Mobiles',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Tablets',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Bags',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Books',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Printer',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Clothing',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'Accessiors',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attributesets' )->insert( [
            'name'=>'giftcards',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'e-books',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'videos',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attributesets' )->insert( [
            'name'=>'games',
            'status'=>'1',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

    }
}
