<?php

use Illuminate\Database\Seeder;

class ProductVariationSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {

        DB::table( 'product_variations' )->insert(
            [
                'product_id'=>1,
                'name' => 'Blue',
                'price' => 660000,
                'order'=>'1',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'attribute_product_id' => '1',
            ] );

            DB::table( 'product_variations' )->insert(
                [
                    'product_id'=>1,
                    'name' => 'Black',
                    'price' => 660000,
                    'order'=>'2',
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' ),
                    'attribute_product_id' => '2',
                ] );

                DB::table( 'product_variations' )->insert(
                    [
                        'product_id'=>2,
                        'name' => '640×1136',
                        'price' => 15000,
                        'order'=>'1',
                        'created_at' => date( 'Y-m-d H:i:s' ),
                        'updated_at' => date( 'Y-m-d H:i:s' ),
                        'attribute_product_id' => '3',
                    ] );

                    DB::table( 'product_variations' )->insert(
                        [
                            'product_id'=>2,
                            'name' => '720×1280',
                            'price' => 15000,
                            'order'=>'2',
                            'created_at' => date( 'Y-m-d H:i:s' ),
                            'updated_at' => date( 'Y-m-d H:i:s' ),
                            'attribute_product_id' => '4',
                        ] );

                        DB::table( 'product_variations' )->insert(
                            [
                                'product_id'=>3,
                                'name' => 'Blue',
                                'price' => 20000,
                                'order'=>'1',
                                'created_at' => date( 'Y-m-d H:i:s' ),
                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                'attribute_product_id' => '5',
                            ] );

                            DB::table( 'product_variations' )->insert(
                                [
                                    'product_id'=>3,
                                    'name' => 'Black',
                                    'price' => 20000,
                                    'order'=>'2',
                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                    'attribute_product_id' => '6',
                                ] );

                                DB::table( 'product_variations' )->insert(
                                    [
                                        'product_id'=>4,
                                        'name' => 'no variation',
                                        'price' => 14000,
                                        'order'=>'1',
                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                        'attribute_product_id' => '7',
                                    ] );

                                    $giftcards = ['5', '6', '7', '8', '9', '10'];
                                    foreach ( $giftcards as $item ) {
                                        DB::table( 'product_variations' )->insert(
                                            [
                                                'product_id'=>$item,
                                                'name' => 'Gift-card 500',
                                                'price' => 50000,
                                                'order'=>'1',
                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                'attribute_product_id' => '21',
                                            ] );
                                            DB::table( 'product_variations' )->insert(
                                                [
                                                    'product_id'=>$item,
                                                    'name' => 'Gift-card 1000',
                                                    'price' => 100000,
                                                    'order'=>'1',
                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                    'attribute_product_id' => '22',
                                                ] );
                                                DB::table( 'product_variations' )->insert(
                                                    [
                                                        'product_id'=>$item,
                                                        'name' => 'Gift-card 2000',
                                                        'price' => 200000,
                                                        'order'=>'1',
                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                        'attribute_product_id' => '23',
                                                    ] );
                                                    DB::table( 'product_variations' )->insert(
                                                        [
                                                            'product_id'=>$item,
                                                            'name' => 'Gift-card 5000',
                                                            'price' => 500000,
                                                            'order'=>'1',
                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                            'attribute_product_id' => '24',
                                                        ] );
                                                        DB::table( 'product_variations' )->insert(
                                                            [
                                                                'product_id'=>$item,
                                                                'name' => 'Gift-card 7500',
                                                                'price' => 750000,
                                                                'order'=>'1',
                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                'attribute_product_id' => '24',
                                                            ] );
                                                        }
                                                        DB::table( 'product_variations' )->insert(
                                                            [
                                                                'product_id'=>11,
                                                                'name' => 'Blue',
                                                                'price' => 660000,
                                                                'order'=>'1',
                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                'attribute_product_id' => '8',
                                                            ] );
                                                            DB::table( 'product_variations' )->insert(
                                                                [
                                                                    'product_id'=>11,
                                                                    'name' => 'Light Violet',
                                                                    'price' => 660000,
                                                                    'order'=>'1',
                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                    'attribute_product_id' => '9',
                                                                ] );
                                                                DB::table( 'product_variations' )->insert(
                                                                    [
                                                                        'product_id'=>12,
                                                                        'name' => 'Blue',
                                                                        'price' => 660000,
                                                                        'order'=>'1',
                                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                        'attribute_product_id' => '10',
                                                                    ] );

                                                                    DB::table( 'product_variations' )->insert(
                                                                        [
                                                                            'product_id'=>13,
                                                                            'name' => 'Blue',
                                                                            'price' => 660000,
                                                                            'order'=>'1',
                                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                            'attribute_product_id' => '11',
                                                                        ] );

                                                                        DB::table( 'product_variations' )->insert(
                                                                            [
                                                                                'product_id'=>14,
                                                                                'name' => 'Blue',
                                                                                'price' => 660000,
                                                                                'order'=>'1',
                                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                'attribute_product_id' => '12',
                                                                            ] );
                                                                            DB::table( 'product_variations' )->insert(
                                                                                [
                                                                                    'product_id'=>15,
                                                                                    'name' => 'Blue',
                                                                                    'price' => 660000,
                                                                                    'order'=>'1',
                                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                    'attribute_product_id' => '13',
                                                                                ] );
                                                                                DB::table( 'product_variations' )->insert(
                                                                                    [
                                                                                        'product_id'=>16,
                                                                                        'name' => 'Blue',
                                                                                        'price' => 660000,
                                                                                        'order'=>'1',
                                                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                        'attribute_product_id' => '14',
                                                                                    ] );
                                                                                    DB::table( 'product_variations' )->insert(
                                                                                        [
                                                                                            'product_id'=>17,
                                                                                            'name' => 'Blue',
                                                                                            'price' => 660000,
                                                                                            'order'=>'1',
                                                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                            'attribute_product_id' => '15',
                                                                                        ] );
                                                                                        DB::table( 'product_variations' )->insert(
                                                                                            [
                                                                                                'product_id'=>18,
                                                                                                'name' => 'Blue',
                                                                                                'price' => 660000,
                                                                                                'order'=>'1',
                                                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                'attribute_product_id' => '16',
                                                                                            ] );
                                                                                            DB::table( 'product_variations' )->insert(
                                                                                                [
                                                                                                    'product_id'=>19,
                                                                                                    'name' => 'Blue',
                                                                                                    'price' => 660000,
                                                                                                    'order'=>'1',
                                                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                    'attribute_product_id' => '17',
                                                                                                ] );
                                                                                                DB::table( 'product_variations' )->insert(
                                                                                                    [
                                                                                                        'product_id'=>20,
                                                                                                        'name' => 'pdf',
                                                                                                        'price' => 40000,
                                                                                                        'order'=>'1',
                                                                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                        'attribute_product_id' => '18',
                                                                                                    ] );
                                                                                                    DB::table( 'product_variations' )->insert(
                                                                                                        [
                                                                                                            'product_id'=>21,
                                                                                                            'name' => 'pdf',
                                                                                                            'price' => 40000,
                                                                                                            'order'=>'1',
                                                                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                            'attribute_product_id' => '19',
                                                                                                        ] );
                                                                                                        DB::table( 'product_variations' )->insert(
                                                                                                            [
                                                                                                                'product_id'=>22,
                                                                                                                'name' => 'pdf',
                                                                                                                'price' => 40000,
                                                                                                                'order'=>'1',
                                                                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                                'attribute_product_id' => '20',
                                                                                                            ] );
                                                                                                        }
                                                                                                    }
