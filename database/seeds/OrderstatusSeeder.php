<?php

use Illuminate\Database\Seeder;

class OrderstatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('order_status')->insert([
             'order_id'=>1,
             'order_item_id'=>null,
             'from_status'=>"processing",
             'to_status'=>"completed",
             'comments'=>null,
             'created_by'=>6,
             'updated_by'=>6,
             'created_at' => date("Y-m-d H:i:s"),
             'updated_at' => date("Y-m-d H:i:s"),
          ]);
    }
}
