<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
        [
            'name' => "admin",
            'email' => "admin@gegocart.com",
            'password' => bcrypt("admin"),
            'usergroup_id' => "1",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "subadmin",
            'email' => "subadmin@gegocart.com",
            'password' => bcrypt("subadmin"),
            'usergroup_id' => "2",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);


        DB::table('users')->insert(
        [
            'name' => "seller1",
            'email' => "seller1@gegocart.com",
            'password' => bcrypt("seller1"),
            'usergroup_id' => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "seller2",
            'email' => "seller2@gegocart.com",
            'password' => bcrypt("seller2"),
            'usergroup_id' => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "seller3",
            'email' => "seller3@gegocart.com",
            'password' => bcrypt("seller3"),
            'usergroup_id' => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "buyer1",
            'email' => "buyer1@gegocart.com",
            'password' => bcrypt("buyer1"),
            'usergroup_id' => "4",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "buyer2",
            'email' => "buyer2@gegocart.com",
            'password' => bcrypt("buyer2"),
            'usergroup_id' => "4",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert(
        [
            'name' => "buyer3",
            'email' => "buyer3@gegocart.com",
            'password' => bcrypt("buyer3"),
            'usergroup_id' => "4",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert(
        [
            'name' => "admin-seller",
            'email' => "admin-seller@gegocart.com",
            'password' => bcrypt("admin-seller"),
            'usergroup_id' => "3",
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
