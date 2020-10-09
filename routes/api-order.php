<?php
Route::group([  
    'namespace'=>'Orders',
    'middleware'=>['jwt.auth']
   ], function () {
	    Route::resource('orders', 'OrderController');
		Route::get('getorderno', 'OrderController@getOrdernumber');
		Route::get('getpaytmorders/{paymentid}/{orderid}','OrderSearchStatusController@getOrderbypaytm');//no data ///paytm transaction
		
		//Seller
		Route::get('orderdetail', 'OrderSearchStatusController@show');
		Route::get('orderdetailstatus/{status}', 'OrderSearchStatusController@showstatusfilter');
		// Route::get('searchorder/{searchquery}', 'OrderController@searchOrder');
		Route::post('searchorder', 'OrderSearchStatusController@searchOrder');


		//Route::post('searchorder', 'OrderController@searchOrder');
		Route::get('orderdetailview/{orderid}', 'OrderSearchStatusController@getOrderdetailview');
		Route::get('getorderstatus/{orderid}','OrderController@getorderstatus');
		Route::get('getinvoicestatus/{orderid}','OrderSearchStatusController@getstatusinvoice');
		Route::get('displayorderstatus/{orderid}','OrderStatusUpdateController@viewOrderStatus');

		Route::post('storestatus', 'OrderStatusUpdateController@storeorderstatus');//seller-hold

		Route::post('cancelorderitem', 'OrderStatusUpdateController@cancelOrderItem');

		Route::post('approveorder', 'OrderController@createOrderApprove');//seller
		Route::post('storerefund', 'TransactionController@storerefund');//seller
		Route::post('getproducttype/{id}', 'OrderController@getProductType');//seller
		
        Route::post('getordertypebyseller/{id}', 'OrderController@getordertypebyseller');//seller
		


});


 // Route::post('getordertypebyseller/{id}', 'Orders\OrderController@getordertypebyseller');//seller

Route::group([  
    'namespace'=>'GiftOrders',
    'middleware'=>['jwt.auth']
   ], function () {

Route::get('giftorders', 'GiftOrderController@index');
Route::get('giftorderview/{id}', 'GiftOrderController@show');
Route::post('/getgiftcode', 'GiftOrderController@giftcode');
   	});

Route::group([  
    'namespace'=>'Addresses',
    'middleware'=>['jwt.auth']
   ], function () {
   	//buyer
//Route::get('addresses/{userid}', 'AddressController@show');
Route::get('getaddress/{id}', 'AddressController@getAddress');
Route::resource('addresses', 'AddressController');
Route::get('addresses/{address}/shipping', 'AddressShippingController@action');
Route::get('addresses/edit/{id}', 'AddressController@edit');
Route::post('addresses/update/{id}', 'AddressController@update');
Route::post('addresses/delete/{id}', 'AddressController@destroy');
Route::get('getdefaultaddress', 'AddressController@getdefaultaddress');
});

