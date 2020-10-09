<?php

use Illuminate\Database\Seeder;

class AttributeProductSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'1',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'1',
            'attribute_id'=>'2',
            'attribute_value'=>'Black',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'2',
            'attribute_id'=>'4',
            'attribute_value'=>'640×1136',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'2',
            'attribute_id'=>'4',
            'attribute_value'=>'720×1280',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'3',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'3',
            'attribute_id'=>'2',
            'attribute_value'=>'Black',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'4',
            'attribute_id'=>'5',
            'attribute_value'=>'no variation',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'11',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'11',
            'attribute_id'=>'2',
            'attribute_value'=>'Black',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'12',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'13',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'14',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'15',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'16',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'17',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'18',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'19',
            'attribute_id'=>'2',
            'attribute_value'=>'Blue',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'20',
            'attribute_id'=>'8',
            'attribute_value'=>'pdf',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'21',
            'attribute_id'=>'8',
            'attribute_value'=>'pdf',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'22',
            'attribute_id'=>'8',
            'attribute_value'=>'pdf',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'5',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'6',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'7',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'8',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'9',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );
        DB::table( 'attribute_product' )->insert( [
            'product_id'=>'10',
            'attribute_id'=>'6',
            'attribute_value'=>'card price',
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

    }
}
