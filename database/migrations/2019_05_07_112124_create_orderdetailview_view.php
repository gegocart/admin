<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderdetailviewView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         DB::statement("CREATE VIEW orderdetailview As 
               select distinct 
               cast(JSON_EXTRACT(p.productdetail, '$.seller.id') as unsigned) as seller_id, 
               a.id as orderid,a.orderno as orderno,
               p.id as order_item_id,
               p.to_email as to_email,
               p.from as fromaddress,
               REPLACE(JSON_EXTRACT(p.productdetail, '$.product.name'),'','') as productname,
               REPLACE(JSON_EXTRACT(p.productdetail, '$.product.slug'),'','') as productslug,
               s.slug as storeslug,
        date_format(`a`.`created_at`,'%d-%M-%y  %r') AS purchased_on,
        s.name as storename,a.status,
        replace(json_extract(`p`.`productdetail`,'$.productimage[0].thumbnailimage'),'','') AS `thumbnailimage`,
        f.card_type as paymentmethod,
        cast(JSON_EXTRACT(p.productdetail, '$.variation.quantity') as unsigned) as quantity,
        cast(JSON_EXTRACT(p.productdetail, '$.variation.id') as unsigned) as variationid,
        REPLACE(JSON_EXTRACT(p.productdetail, '$.variation.name'),'','') as variationname,
        JSON_EXTRACT(p.productdetail, '$.variation.price') as productprice,
        cast(JSON_EXTRACT(p.productdetail, '$.tax_type.id') as unsigned) as tax_id,
        cast(JSON_EXTRACT(p.productdetail, '$.tax_type.tax_rate') as unsigned) as taxrate,
        CONCAT((select firstname from addresses WHERE addresses.id=a.address_id) ,' ',(select lastname from addresses WHERE addresses.id=a.address_id)) as billname,
                CONCAT((select address_1 from addresses WHERE addresses.id=a.address_id) ,' ',(select address_2 from addresses WHERE addresses.id=a.address_id)) as billaddress,
        (select city_id from addresses WHERE addresses.id=a.address_id) as billcity,
         (select type from products WHERE products.id=p.product_id) as product_type,
          (select name from products WHERE products.id=p.card_image) as card_name,
         (select name from cities where cities.id IN (select city_id from addresses WHERE addresses.id=a.address_id)) as cityname,
          (select state_id from addresses WHERE addresses.id=a.address_id) as state_id,
         (select name from states where states.id IN (select state_id from addresses WHERE addresses.id=a.address_id)) as statename,
         (select postal_code from addresses WHERE addresses.id=a.address_id) as billpostcode,
          (select mobileno from addresses WHERE addresses.id=a.address_id) as mobileno,
          (select country_id from addresses WHERE addresses.id=a.address_id) as country_id,
         (select name from countries where countries.id IN (select country_id from addresses WHERE addresses.id=a.address_id)) as country,
         (select name from shipping_methods WHERE shipping_methods.id=a.shipping_method_id) as shippingmethod,
         (select price from shipping_methods WHERE shipping_methods.id=a.shipping_method_id) as shippingprice,
        t.transaction_id,(cast(JSON_EXTRACT(p.productdetail, '$.variation.quantity') as unsigned) * JSON_EXTRACT(p.productdetail, '$.variation.price')) as productsubtotal,a.created_at
        from orders a
        inner join transactions t on t.order_id=a.id
        inner join product_variation_order b on b.order_id=a.id
        INNER join order_item p on p.order_id=a.id
        inner join payment_methods f on f.id=a.payment_method_id
        inner join stores s on s.id=json_extract(p.productdetail,'$.product.store_id') 
        and s.user_id=json_extract(p.productdetail,'$.product.user_id')
        
        ");
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS orderdetailview");
    }
}
