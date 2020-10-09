<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("CREATE VIEW order_status_view
                            AS
                         select o.id as orderid,o.orderno,p.seller_id as sellerid,o.status,s.id as orderstatusid,
                        s.from_status,s.to_status ,p.id from orders o
                        inner join order_item p on p.order_id=o.id
                        inner join order_status s on s.order_id=o.id and p.status='completed'
                        where p.status='completed'
            ");
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        DB::statement("DROP VIEW IF EXISTS order_status_view");
    }
}
