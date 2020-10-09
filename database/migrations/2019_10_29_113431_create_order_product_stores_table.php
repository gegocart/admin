<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("CREATE VIEW order_product_stores AS 
                SELECT a.*,JSON_EXTRACT(v.productdetail, '$.variation.id') as product_variation_id,
                JSON_EXTRACT(v.productdetail, '$.variation.quantity') as quantity,
                REPLACE(JSON_EXTRACT(v.productdetail, '$.variation.name'),'','') as variationame,
                JSON_EXTRACT(v.productdetail, '$.variation.name') as price, 
                REPLACE(JSON_EXTRACT(v.productdetail, '$.product.name'),'','') as name,
                json_extract(v.productdetail,'$.product.store_id') as store_id,
                s.name as storename,s.user_id as sellerid,v.id as orderitemid,
                s.address as selleraddress,u.name as sellername,u.email as selleremail from 
                orders a 
                inner join order_item v on v.order_id=a.id 
                inner join stores s on s.id=json_extract(v.productdetail,'$.product.store_id') 
                inner join users u on u.id=s.user_id
            ");
         
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS order_product_stores");
    }
}
