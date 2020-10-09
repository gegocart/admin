<?php

use Illuminate\Database\Seeder;

class StockSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        /* DB::table( 'stocks' )->insert(
        [
            'quantity'=>100,
            'product_variation_id' => 1,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),

        ] );

        DB::table( 'stocks' )->insert(
            [
                'quantity'=>100,
                'product_variation_id' => 2,
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),

            ] );

            DB::table( 'stocks' )->insert(
                [
                    'quantity'=>100,
                    'product_variation_id' => 3,
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' ),

                ] );

                DB::table( 'stocks' )->insert(
                    [
                        'quantity'=>100,
                        'product_variation_id' => 4,
                        'created_at' => date( 'Y-m-d H:i:s' ),
                        'updated_at' => date( 'Y-m-d H:i:s' ),

                    ] );

                    DB::table( 'stocks' )->insert(
                        [
                            'quantity'=>100,
                            'product_variation_id' => 5,
                            'created_at' => date( 'Y-m-d H:i:s' ),
                            'updated_at' => date( 'Y-m-d H:i:s' ),

                        ] );
                        DB::table( 'stocks' )->insert(
                            [
                                'quantity'=>100,
                                'product_variation_id' => 6,
                                'created_at' => date( 'Y-m-d H:i:s' ),
                                'updated_at' => date( 'Y-m-d H:i:s' ),

                            ] );
                            DB::table( 'stocks' )->insert(
                                [
                                    'quantity'=>100,
                                    'product_variation_id' => 7,
                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                    'updated_at' => date( 'Y-m-d H:i:s' ),

                                ] );
                                DB::table( 'stocks' )->insert(
                                    [
                                        'quantity'=>100,
                                        'product_variation_id' => 8,
                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                        'updated_at' => date( 'Y-m-d H:i:s' ),

                                    ] );
                                    DB::table( 'stocks' )->insert(
                                        [
                                            'quantity'=>100,
                                            'product_variation_id' => 9,
                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                            'updated_at' => date( 'Y-m-d H:i:s' ),

                                        ] );
                                        */
                                        for ( $i = 1; $i <= 50; $i++ ) {
                                            DB::table( 'stocks' )->insert(
                                                [
                                                    'quantity'=>100,
                                                    'product_variation_id' => $i,
                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                    'updated_at' => date( 'Y-m-d H:i:s' ),

                                                ] );

                                            }

                                        }
                                    }
