<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {

        DB::table( 'stores' )->insert(
            [
                'user_id'=>3,
                'name'=>'Mobile Stores',
                'slug' => 'mobile-stores',
                'status' => 1,
                'description' => 'This is a test',
                'keywords' => 'Test on mobiles stores',
                'storelogo'=>'uploads/storeimage/logo//h596Pj8KCj0ikNm9zVlxahZrfsEs8frE0uZaQTWT.png',
                'storeimage'=>'uploads/storeimage//CRFRo2AV8Mklcr9JFrfdP261bAAWh36TtKA8QonD.jpeg',
                'address'=>'',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
            ] );

            DB::table( 'stores' )->insert(
                [
                    'user_id'=>3,
                    'name'=>'Mobile Accessories Stores',
                    'slug' => 'mobile-accessories-stores',
                    'status'=>1,
                    'description' => 'This is a test',
                    'keywords' => 'Test on accessories stores',
                    'storelogo'=>'uploads/storeimage/logo//h596Pj8KCj0ikNm9zVlxahZrfsEs8frE0uZaQTWT.png',
                    'storeimage'=>'uploads/storeimage//CRFRo2AV8Mklcr9JFrfdP261bAAWh36TtKA8QonD.jpeg',
                    'address'=>'',
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' ),
                ] );

                DB::table( 'stores' )->insert(
                    [
                        'user_id'=>3,
                        'name'=>'Dress material',
                        'slug' => 'dress-material',
                        'status'=>1,
                        'description' => 'This is a test',
                        'keywords' => 'Test on dress material stores',
                        'storelogo'=>'uploads/storeimage/logo//PO0vyRyhHxCtcv7jrTpieFbXfXlrUsvfc6EfeFh0.png',
                        'storeimage'=>'uploads/storeimage//GnuXDWDow28qB7HdHnNECI2i4CrRWqhWW6cBL2wL.jpeg',
                        'address'=>'',
                        'created_at' => date( 'Y-m-d H:i:s' ),
                        'updated_at' => date( 'Y-m-d H:i:s' ),
                    ] );

                    DB::table( 'stores' )->insert(
                        [
                            'user_id'=>3,
                            'name'=>'Books Store',
                            'slug' => 'books-stores',
                            'status'=>1,
                            'description' => 'This is a test',
                            'keywords' => 'Test on books stores',
                            'storelogo'=>'uploads/storeimage/logo//crGXsVYzTjX8qdsc926g4U75B2BrCUao7hK4uPyT.jpeg',
                            'storeimage'=>'uploads/storeimage//hzVX77lFMDvGHjRXWo7r32xwA005Lt7B5HI3rjAg.jpeg',
                            'address'=>'',
                            'created_at' => date( 'Y-m-d H:i:s' ),
                            'updated_at' => date( 'Y-m-d H:i:s' ),
                        ] );
                        DB::table( 'stores' )->insert(
                            [
                                'user_id'=>9,
                                'name'=>'gift Store',
                                'slug' => 'gift-stores',
                                'status'=>1,
                                'description' => 'This is a test',
                                'keywords' => 'Test on gift stores',
                                'storelogo'=>'uploads/storeimage/logo//crGXsVYzTjX8qdsc926g4U75B2BrCUao7hK4uPyT.jpeg',
                                'storeimage'=>'uploads/storeimage//hzVX77lFMDvGHjRXWo7r32xwA005Lt7B5HI3rjAg.jpeg',
                                'address'=>'',
                                'created_at' => date( 'Y-m-d H:i:s' ),
                                'updated_at' => date( 'Y-m-d H:i:s' ),
                            ] );

                            DB::table( 'stores' )->insert(
                                [
                                    'user_id'=>3,
                                    'name'=>'Digital Stores',
                                    'slug' => 'digital-stores',
                                    'status'=>1,
                                    'description' => 'This is a test',
                                    'keywords' => 'Test on digital stores',
                                    'storelogo'=>'uploads/storeimage/logo//crGXsVYzTjX8qdsc926g4U75B2BrCUao7hK4uPyT.jpeg',
                                    'storeimage'=>'uploads/storeimage//hzVX77lFMDvGHjRXWo7r32xwA005Lt7B5HI3rjAg.jpeg',
                                    'address'=>'',
                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                ] );

                            }
                        }
