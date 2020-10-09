<?php

use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('invoices')->insert(
        [
            'invoiceno'=>'INV001',	
            'order_id' => 1,
            'order_item_id'=>null,
            'user_id' => 6,
            'invoicedate'=>'2019-10-23',
            'status'=>'invoiced',
            'total'=>5400,
            'filepath'=>null,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);
    }
}
