<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'products' )->insert(
            [
                'user_id'=>3,
                'store_id'=>1,
                'name' => 'Honor 9N (Blue, 4GB RAM, 64GB Storage)',
                'ratings'=>4,
                'slug' => 'honor-9n-blue-4gb-ram-64gb-storage',
                'sku'=>'skuhonor9nblue',
                'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                'product_image' => '',
                'thumbnailimage' => '',
                'price'=>660000,
                'weight'=>1000,
                'tax_id'=>1,
                'status'=>1,
                'created_at' => date( 'Y-m-d H:i:s' ),
                'updated_at' => date( 'Y-m-d H:i:s' ),
                'type'=>'physical',
                'approved_at' => date( 'Y-m-d H:i:s' ),
                'approved_by'=>1
            ] );

            DB::table( 'products' )->insert(
                [
                    'user_id'=>3,
                    'store_id'=>2,
                    'name' => 'POPIO Tempered Glass for Samsung Galaxy M30 (Transparent)-Full Screen Coverage (Except Edges)',
                    'slug' => 'popio-tempered-glass-for-samsung-galaxy-m30-transparent-full-screen-coverage-except-edges',
                    'sku'=>'skutemperedglassm30',
                    'description' => 'test',
                    'product_image' => '',
                    'thumbnailimage' => '',
                    'price'=>15000,
                    'weight'=>80,
                    'tax_id'=>1,
                    'status'=>1,
                    'created_at' => date( 'Y-m-d H:i:s' ),
                    'updated_at' => date( 'Y-m-d H:i:s' ),
                    'type'=>'physical',
                    'approved_at' => date( 'Y-m-d H:i:s' ),
                    'approved_by'=>1
                ] );

                DB::table( 'products' )->insert(
                    [
                        'user_id'=>3,
                        'store_id'=>3,
                        'name' => 'Tee Town Dab Marshmello Cotton Round Neck T-Shirt for Mens',
                        'slug' => 'tee-town-dab-marshmello-cotton-round-neck-t-shirt-for-mens',
                        'sku'=>'skuteetown2019',
                        'description' => 'test',
                        'product_image' => '',
                        'thumbnailimage' => '',
                        'price'=>20000,
                        'weight'=>50,
                        'tax_id'=>2,
                        'status'=>1,
                        'created_at' => date( 'Y-m-d H:i:s' ),
                        'updated_at' => date( 'Y-m-d H:i:s' ),
                        'type'=>'physical',
                        'approved_at' => date( 'Y-m-d H:i:s' ),
                        'approved_by'=>1
                    ] );

                    DB::table( 'products' )->insert(
                        [
                            'user_id'=>3,
                            'store_id'=>4,
                            'name' => 'Fairy Tales (My Jumbo Book) Paperback – 2019',
                            'slug' => 'fairy-tales-my-jumbo-book-paperback-2019',
                            'sku'=>'skufairtales2019',
                            'description' => 'test',
                            'product_image' => '',
                            'thumbnailimage' => '',
                            'price'=>14000,
                            'weight'=>50,
                            'tax_id'=>6,
                            'status'=>1,
                            'created_at' => date( 'Y-m-d H:i:s' ),
                            'updated_at' => date( 'Y-m-d H:i:s' ),
                            'type'=>'physical',
                            'approved_at' => date( 'Y-m-d H:i:s' ),
                            'approved_by'=>1
                        ] );

                        DB::table( 'products' )->insert(
                            [
                                'user_id'=>9,
                                'store_id'=>5,
                                'name' => 'Birthday(simple card)',
                                'slug' => 'gift-card',
                                'sku'=>'giftcard',
                                'description' => 'test',
                                'product_image' => '',
                                'thumbnailimage' => '',
                                'price'=>50000,
                                'tax_id'=>5,
                                'status'=>1,
                                'type'=>'giftcard',
                                'created_at' => date( 'Y-m-d H:i:s' ),
                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                'approved_by'=>1
                            ] );

                            DB::table( 'products' )->insert(
                                [
                                    'user_id'=>9,
                                    'store_id'=>5,
                                    'name' => 'Birthday(cake)',
                                    'slug' => 'gift-card1',
                                    'sku'=>'giftcard1',
                                    'description' => 'test',
                                    'product_image' => '',
                                    'thumbnailimage' => '',
                                    'price'=>100000,
                                    'tax_id'=>5,
                                    'status'=>1,
                                    'type'=>'giftcard',
                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                    'approved_by'=>1
                                ] );

                                DB::table( 'products' )->insert(
                                    [
                                        'user_id'=>9,
                                        'store_id'=>5,
                                        'name' => 'Birthday(ballon)',
                                        'slug' => 'gift-card2',
                                        'sku'=>'giftcard2',
                                        'description' => 'test',
                                        'product_image' => '',
                                        'thumbnailimage' => '',
                                        'price'=>200000,
                                        'tax_id'=>5,
                                        'status'=>1,
                                        'type'=>'giftcard',
                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                        'approved_by'=>1
                                    ] );
                                    DB::table( 'products' )->insert(
                                        [
                                            'user_id'=>9,
                                            'store_id'=>5,
                                            'name' => 'Birthday(flags)',
                                            'slug' => 'gift-card3',
                                            'sku'=>'giftcard3',
                                            'description' => 'test',
                                            'product_image' => '',
                                            'thumbnailimage' => '',
                                            'price'=>500000,
                                            'tax_id'=>5,
                                            'status'=>1,
                                            'type'=>'giftcard',
                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                            'approved_by'=>1
                                        ] );
                                        DB::table( 'products' )->insert(
                                            [
                                                'user_id'=>9,
                                                'store_id'=>5,
                                                'name' => 'GiftCard(flower)',
                                                'slug' => 'gift-card4',
                                                'sku'=>'giftcard4',
                                                'description' => 'test',
                                                'product_image' => '',
                                                'thumbnailimage' => '',
                                                'price'=>750000,
                                                'tax_id'=>5,
                                                'status'=>1,
                                                'type'=>'giftcard',
                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                'approved_by'=>1
                                            ] );
                                            DB::table( 'products' )->insert(
                                                [
                                                    'user_id'=>9,
                                                    'store_id'=>5,
                                                    'name' => 'Birthday(ballons)',
                                                    'slug' => 'gift-card5',
                                                    'sku'=>'giftcard5',
                                                    'description' => 'test',
                                                    'product_image' => '',
                                                    'thumbnailimage' => '',
                                                    'price'=>750000,
                                                    'tax_id'=>5,
                                                    'status'=>1,
                                                    'type'=>'giftcard',
                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                    'approved_by'=>1
                                                ] );

                                                DB::table( 'products' )->insert(
                                                    [
                                                        'user_id'=>3,
                                                        'store_id'=>1,
                                                        'name' => 'Samsung 1',
                                                        'ratings'=>4,
                                                        'slug' => 'samsung1',
                                                        'sku'=>'samsung1',
                                                        'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                        'product_image' => '',
                                                        'thumbnailimage' => '',
                                                        'price'=>660000,
                                                        'weight'=>1000,
                                                        'tax_id'=>1,
                                                        'status'=>1,
                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                        'type'=>'physical',
                                                        'approved_at' => date( 'Y-m-d H:i:s' ),
                                                        'approved_by'=>1
                                                    ] );
                                                    DB::table( 'products' )->insert(
                                                        [
                                                            'user_id'=>3,
                                                            'store_id'=>1,
                                                            'name' => 'Samsung 2',
                                                            'slug' => 'samsung2',
                                                            'sku'=>'samsung2',
                                                            'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                            'product_image' => '',
                                                            'thumbnailimage' => '',
                                                            'price'=>660000,
                                                            'weight'=>1000,
                                                            'tax_id'=>1,
                                                            'status'=>1,
                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                            'type'=>'physical',
                                                            'approved_at' => date( 'Y-m-d H:i:s' ),
                                                            'approved_by'=>1
                                                        ] );

                                                        DB::table( 'products' )->insert(
                                                            [
                                                                'user_id'=>3,
                                                                'store_id'=>1,
                                                                'name' => 'Samsung 3',
                                                                'slug' => 'samsung3',
                                                                'sku'=>'samsung3',
                                                                'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                'product_image' => '',
                                                                'thumbnailimage' => '',
                                                                'price'=>660000,
                                                                'weight'=>1000,
                                                                'tax_id'=>1,
                                                                'status'=>1,
                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                'type'=>'physical',
                                                                'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                'approved_by'=>1
                                                            ] );

                                                            DB::table( 'products' )->insert(
                                                                [
                                                                    'user_id'=>3,
                                                                    'store_id'=>1,
                                                                    'name' => 'Samsung 4',
                                                                    'slug' => 'samsung4',
                                                                    'sku'=>'samsung4',
                                                                    'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                    'product_image' => '',
                                                                    'thumbnailimage' => '',
                                                                    'price'=>660000,
                                                                    'weight'=>1000,
                                                                    'tax_id'=>1,
                                                                    'status'=>1,
                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                    'type'=>'physical',
                                                                    'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                    'approved_by'=>1
                                                                ] );

                                                                DB::table( 'products' )->insert(
                                                                    [
                                                                        'user_id'=>3,
                                                                        'store_id'=>1,
                                                                        'name' => 'Nokia 1',
                                                                        'ratings'=>3,
                                                                        'slug' => 'nokia',
                                                                        'sku'=>'nokia1',
                                                                        'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                        'product_image' => '',
                                                                        'thumbnailimage' => '',
                                                                        'price'=>660000,
                                                                        'weight'=>1000,
                                                                        'tax_id'=>1,
                                                                        'status'=>1,
                                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                        'type'=>'physical',
                                                                        'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                        'approved_by'=>1
                                                                    ] );

                                                                    DB::table( 'products' )->insert(
                                                                        [
                                                                            'user_id'=>3,
                                                                            'store_id'=>1,
                                                                            'name' => 'micromax 1',
                                                                            'ratings'=>3,
                                                                            'slug' => 'micromax',
                                                                            'sku'=>'mciromax',
                                                                            'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                            'product_image' => '',
                                                                            'thumbnailimage' => '',
                                                                            'price'=>660000,
                                                                            'weight'=>1000,
                                                                            'tax_id'=>1,
                                                                            'status'=>1,
                                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                            'type'=>'physical',
                                                                            'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                            'approved_by'=>1
                                                                        ] );

                                                                        DB::table( 'products' )->insert(
                                                                            [
                                                                                'user_id'=>3,
                                                                                'store_id'=>1,
                                                                                'name' => 'lenovo 1',
                                                                                'ratings'=>4,
                                                                                'slug' => 'lenovo1',
                                                                                'sku'=>'lenovo1',
                                                                                'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                                'product_image' => '',
                                                                                'thumbnailimage' => '',
                                                                                'price'=>660000,
                                                                                'weight'=>1000,
                                                                                'tax_id'=>1,
                                                                                'status'=>1,
                                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                'type'=>'physical',
                                                                                'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                'approved_by'=>1
                                                                            ] );

                                                                            DB::table( 'products' )->insert(
                                                                                [
                                                                                    'user_id'=>3,
                                                                                    'store_id'=>1,
                                                                                    'name' => 'Lenovo 2',
                                                                                    'slug' => 'lenovo2',
                                                                                    'sku'=>'lenovo2',
                                                                                    'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                                    'product_image' => '',
                                                                                    'thumbnailimage' => '',
                                                                                    'price'=>660000,
                                                                                    'weight'=>1000,
                                                                                    'tax_id'=>1,
                                                                                    'status'=>1,
                                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                    'type'=>'physical',
                                                                                    'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                    'approved_by'=>1
                                                                                ] );

                                                                                DB::table( 'products' )->insert(
                                                                                    [
                                                                                        'user_id'=>3,
                                                                                        'store_id'=>1,
                                                                                        'name' => 'vivo 1',
                                                                                        'ratings'=>3,
                                                                                        'slug' => 'vivo1',
                                                                                        'sku'=>'vivo1',
                                                                                        'description' => "1.13MP+2MP dual camera and 16MP front facing camera
2.14.83 centimeters (5.84-inch) multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution 16M color support
3.Memory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 256GB| Dual SIM with dual standby (4G+4G)
4.Android v8 Oreo operating system with 2.36GHz + 1.7GHz Kirin 659 octa core processor
3000mAH lithium-polymer battery, SCREEN TYPE: TFT-LCD
1 year manufacturer warranty for device and 6 months manufacturer warranty for in-box accessories including batteries from the date of purchase
5.Box also includes: Charger, USB Cable, Quick Start Guide, Warranty Card, Eject Tool, Protective Case",
                                                                                        'product_image' => '',
                                                                                        'thumbnailimage' => '',
                                                                                        'price'=>660000,
                                                                                        'weight'=>1000,
                                                                                        'tax_id'=>1,
                                                                                        'status'=>1,
                                                                                        'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                        'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                        'type'=>'physical',
                                                                                        'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                        'approved_by'=>1
                                                                                    ] );
                                                                                    DB::table( 'products' )->insert(
                                                                                        [
                                                                                            'user_id'=>3,
                                                                                            'store_id'=>6,
                                                                                            'name' => 'Computer Book',
                                                                                            'slug' => 'computer-book',
                                                                                            'sku'=>'computerbook',
                                                                                            'description' => 'to learn about computer basics',
                                                                                            'product_image' => '',
                                                                                            'thumbnailimage' => '',
                                                                                            'price'=>40000,
                                                                                            'weight'=>1,
                                                                                            'tax_id'=>1,
                                                                                            'status'=>1,
                                                                                            'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                            'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                            'type'=>'downloadable',
                                                                                            'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                            'approved_by'=>1
                                                                                        ] );

                                                                                        DB::table( 'products' )->insert(
                                                                                            [
                                                                                                'user_id'=>3,
                                                                                                'store_id'=>6,
                                                                                                'name' => 'Maths Book',
                                                                                                'slug' => 'maths-book',
                                                                                                'sku'=>'mathsbook',
                                                                                                'description' => 'to learn about maths basics',
                                                                                                'product_image' => '',
                                                                                                'thumbnailimage' => '',
                                                                                                'price'=>40000,
                                                                                                'weight'=>1,
                                                                                                'tax_id'=>1,
                                                                                                'status'=>1,
                                                                                                'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                'type'=>'downloadable',
                                                                                                'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                                'approved_by'=>1
                                                                                            ] );
                                                                                            DB::table( 'products' )->insert(
                                                                                                [
                                                                                                    'user_id'=>3,
                                                                                                    'store_id'=>6,
                                                                                                    'name' => 'Science Book',
                                                                                                    'slug' => 'science-book',
                                                                                                    'sku'=>'sciencebook',
                                                                                                    'description' => 'to learn about science basics',
                                                                                                    'product_image' => '',
                                                                                                    'thumbnailimage' => '',
                                                                                                    'price'=>40000,
                                                                                                    'weight'=>1,
                                                                                                    'tax_id'=>1,
                                                                                                    'status'=>1,
                                                                                                    'created_at' => date( 'Y-m-d H:i:s' ),
                                                                                                    'updated_at' => date( 'Y-m-d H:i:s' ),
                                                                                                    'type'=>'downloadable',
                                                                                                    'approved_at' => date( 'Y-m-d H:i:s' ),
                                                                                                    'approved_by'=>1
                                                                                                ] );

                                                                                            }
                                                                                        }
