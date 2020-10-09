<?php

use Illuminate\Database\Seeder;

class SellerProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sellerprofiles')->Insert([
        'user_id'    => 3,
        'seller_name'      => 'seller1',
        'mobileno'=>'7845869475',
        'email'=>'seller1@gegocart.com',
        'company_name'=> 'test',
        'company_url'=> 'test',
        'status'=> 'approved',
        'aboutbusiness'=> 'test',
        'pan_number'=> '545478787',
        'bankaccount_number'=> null,
        'bankaccountdetail'=> null,
        'created_at'    => date("Y-m-d H:i:s"),
        'updated_at'    => date("Y-m-d H:i:s"), 
        'approved_by'=>1   
      ]);


        DB::table('sellerprofiles')->Insert([
        'user_id'    => 4,
        'seller_name'      => 'seller2',
        'mobileno'=>'98458694475',
        'email'=>'seller2@gegocart.com',
        'company_name'=> 'testseller2',
        'company_url'=> 'testseller2',
        'status'=> 'approved',
        'aboutbusiness'=> 'test',
        'pan_number'=> '658478787',
        'bankaccount_number'=> null,
        'bankaccountdetail'=> null,
        'created_at'    => date("Y-m-d H:i:s"),
        'updated_at'    => date("Y-m-d H:i:s"), 
        'approved_by'=>1   
      ]);


        DB::table('sellerprofiles')->Insert([
        'user_id'    => 5,
        'seller_name' => 'seller3',
        'mobileno'=>'5695869475',
        'email'=>'seller3@gegocart.com',
        'company_name'=> 'testseller3',
        'company_url'=> 'testseller3',
        'status'=> 'approved',
        'aboutbusiness'=> 'test',
        'pan_number'=> '545478787',
        'bankaccount_number'=> null,
        'bankaccountdetail'=> null,
        'created_at'    => date("Y-m-d H:i:s"),
        'updated_at'    => date("Y-m-d H:i:s"), 
        'approved_by'=>1   
      ]);

        DB::table('sellerprofiles')->Insert([
        'user_id'    => 9,
        'seller_name'      => 'admin-seller',
        'mobileno'=>'7845869421',
        'email'=>'admin-seller@gegocart.com',
        'company_name'=> 'test',
        'company_url'=> 'test',
        'status'=> 'approved',
        'aboutbusiness'=> 'test',
        'pan_number'=> '545478787',
        'bankaccount_number'=> null,
        'bankaccountdetail'=> null,
        'created_at'    => date("Y-m-d H:i:s"),
        'updated_at'    => date("Y-m-d H:i:s"), 
        'approved_by'=>1   
      ]);
    }
}
