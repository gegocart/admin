<?php

use Illuminate\Database\Seeder;

class transactionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('transactions')->insert(
        [
            'order_id'=>1,
            'user_id' =>6,
            'type' => 1,
            'status'=>2,
            'action'=>'completed',
            'amount'=>89,
            'request'=>'586',
            'response'=>1,
            'transaction_date'=>date("Y-m-d H:i:s"),
            'transaction_id'=>'',
            'comment'=>'',
            'entity_id'=>1,
            'entity_name'=>'',
            'balance_before'=>'0.00',
            'balance_after'=>89,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
           
        ]);//

    }
}
