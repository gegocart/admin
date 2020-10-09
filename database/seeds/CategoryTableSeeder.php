<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'categories' )->insert( [
            'name'=>'Mobiles,Computers & Tablets',
            'slug'=>'mobiles-computers-tablets',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'1',
            'commission_fee'=>5
        ] );

        DB::table( 'categories' )->insert( [
            'name'=>'TV,Appliances & Electronics',
            'slug'=>'tv-appliances-electronics',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'2',
            'commission_fee'=>5
        ] );

        DB::table( 'categories' )->insert( [
            'name'=>"Men's Fashion",
            'slug'=>'mens-fashion',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'3',
            'commission_fee'=>5
        ] );

        DB::table( 'categories' )->insert( [

            'name'=>"Women's Fashion",
            'slug'=>'women-fashion',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'4',
            'commission_fee'=>5

        ] );

        DB::table( 'categories' )->insert( [

            'name'=>'Books & Audible',
            'slug'=>'books-audible',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'4',
            'commission_fee'=>10

        ] );
        DB::table( 'categories' )->insert( [

            'name'=>'Gift Cards',
            'slug'=>'gift-cards',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'4',

        ] );

        DB::table( 'categories' )->insert( [

            'name'=>'Digital Products',
            'slug'=>'digital-products',
            // 'status'=>'1',
            'parent_id'=>null,
            'created_at' => date( 'Y-m-d H:i:s' ),
            'updated_at' => date( 'Y-m-d H:i:s' ),
            'order'=>'4',

        ] );

        $mobilescomputers =  ['Mobiles Phone', 'Mobile Accessories', 'Power Bank', 'Printers & Link', 'Computers', 'Monitor', 'Tablets'];

        foreach ( $mobilescomputers as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'1',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'5',
                'commission_fee'=>0
            ] );
        }

        $tvappliances =  ['Televisions', 'HeadPhones', 'Cameras', 'Air Conditioners', 'Washing Machince'];

        foreach ( $tvappliances as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'2',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'6',
                'commission_fee'=>0
            ] );
        }

        $menswashion = ['Mens Clothing', 'Mens Shoes', 'Mens Accessories'];

        foreach ( $menswashion as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'3',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'7',
                'commission_fee'=>0
            ] );
        }

        $womensclothing = ['Womens Clothing', 'Womens Shoes', 'Womens Accessories'];

        foreach ( $womensclothing as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'4',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'8',
                'commission_fee'=>0
            ] );
        }

        $booksaudible = ['Books', 'Audible Audiobooks'];

        foreach ( $booksaudible as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'5',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'8',
                'commission_fee'=>0
            ] );
        }

        $giftcards = ['Birthday', 'Wedding', 'Festival'];
        foreach ( $giftcards as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'6',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'8',

            ] );
        }

        $digitalproducts = ['e-books', 'videos', 'games'];

        foreach ( $digitalproducts as $item ) {
            DB::table( 'categories' )->insert( [
                'name'=>$item,
                'slug'=>Str::slug( $item ),
                //'status'=>'1',
                'parent_id'=>'7',
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'order'=>'8',
                'commission_fee'=>0
            ] );
        }

    }
}
