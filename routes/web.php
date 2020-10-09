<?php

// Route::group([
//     'prefix' => 'auth',
//     'middleware' => ['auth','user'],
//    ], function () {
//     Route::post('login', 'Auth\LoginController@action');
//    });

/*Route::get('/', function () {
    return redirect('admin/');
});
*/

//Auth::routes(['verify' => true]);

 Route::get('region', 'Settings\RegionController@getvalue');
 
Route::get('emailverify/{token}', 'Auth\RegisterController@verifyUser');



   Route::group(['middleware' => ['guest'] ], function () {
      Route::get('/','Admin\LoginController@create')->name('login');
    
      Route::post('/','Admin\LoginController@login');
      Route::get('/forgetpassword','Admin\ForgetPasswordController@create');
      Route::post('/forgetpassword','Admin\ForgetPasswordController@store');

      Route::get('/forgetverify/{token}', 'Admin\ForgetPasswordController@verify');
      
   });


   Route::group(['middleware' => ['auth'] ], function () {
   
   Route::get('logout', 'Admin\LoginController@logout');

  
});


Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/dashboard','DashboardController@index');
    Route::get('/dashboard/getorders','DashboardController@getOrders');    
    Route::get('/dashboard/getbuyer','DashboardController@getBuyer'); 
    Route::get('/dashboard/getseller','DashboardController@getSeller'); 
});



Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Buyer'],function(){


  Route::get('/buyer/{id}/addresses', 'AddressController@index'); 
  Route::get('/buyer/{userid}/address/{id}/edit', 'AddressController@edit'); 
  Route::post('/buyer/{userid}/address/{id}/edit', 'AddressController@update');
  Route::get('/buyer/address/{id}/delete', 'AddressController@destroy');
  Route::post('/buyer/delete', 'BuyerController@destroy');
  Route::get('/buyer/{id}/edit', 'BuyerController@edit'); 
  Route::post('/buyer/{id}/edit', 'BuyerController@update'); 
  
  Route::post('/buyer/verify', 'BuyerController@verifyCode');

  Route::get('/buyer', 'BuyerController@index'); 
  Route::get('/buyer/add', 'BuyerController@create'); 
  Route::post('/buyer/add', 'BuyerController@store');

  Route::get('/buyer/{id}/getuser', 'BuyerController@getuser');
  Route::get('/buyer/{id}/details', 'BuyerController@show');

  // Route::get('/buyer/{id}/orders', 'BuyerController@orders');
  // Route::get('/buyer/{id}/giftorders', 'BuyerController@giftorders');
  Route::get('/buyer/{id}/orders', 'OrderController@orders');
  // Route::get('/buyer/{id}/giftorders', 'OrderController@giftorders');
  // Route::get('/buyer/{id}/del_order', 'BuyerController@delOrder');

  Route::post('/buyer/reviews/update', 'ReviewController@reviewUpdate'); 
  Route::get('/buyer/{id}/del_review', 'ReviewController@delReview');
  Route::get('/buyer/{id}/getreview', 'ReviewController@getreview');
  Route::get('/buyer/{id}/reviews', 'ReviewController@reviews');
  
  Route::get('/buyer/{id}/activities', 'BuyerController@activities');
  Route::get('/buyer/{id}/loginhistory', 'BuyerController@loginhistory');
  Route::post('/buyer/{id}/update', 'BuyerController@statusUpdate');
  Route::get('/buyer/check', 'BuyerController@check');
  Route::post('/buyer/resetpassword', 'ResetPasswordController@resetpassword');
  Route::get('/buyer/{id}/sendmail', 'MailMessageController@create');
  Route::post('/buyer/{id}/sendmail', 'MailMessageController@SendMail');

  // Route::get('/buyer/{id}/reviews', 'BuyerController@reviews');
  // Route::get('/buyer/{id}/getreview', 'BuyerController@getreview');
  // Route::get('/buyer/{id}/del_review', 'BuyerController@delReview');
  // Route::post('/buyer/reviews/update', 'BuyerController@reviewUpdate'); 
  


});







Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin'],function(){
  Route::get('/changepassword', 'ChangePasswordController@create');
  Route::post('/changepassword', 'ChangePasswordController@store');

  Route::get('/mailtemplates', 'MailTemplateController@index');
  Route::get('/mailtemplates/{id}/edit', 'MailTemplateController@edit');
  Route::post('/mailtemplates/{id}/edit', 'MailTemplateController@update');

});



Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Order'],function(){

  Route::get('/order/{slug}', 'OrderController@create');
  Route::post('/order/getdata/{slug}', 'OrderController@getData');

  Route::post('/order/{id}/statusupdate', 'OrderController@update');



});
Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\GiftOrder'],function(){
  // Route::get('/transaction/pending', 'TransactionController@pending');
  // Route::get('/transaction/approve', 'TransactionController@approve');
  // Route::get('/transaction/cancel', 'TransactionController@cancel');
 
   Route::get('/giftorder', 'GiftOrderController@index');
   Route::post('/giftorder/{id}/update', 'GiftOrderController@update');
   Route::get('/giftorder/{id}/getdetails', 'GiftOrderController@getdetails');
   Route::get('/giftorder/{id}/show', 'GiftOrderController@show');
   Route::post('/giftorder/getlist', 'GiftOrderController@create');
});
 


Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Seller'],function(){
 
 // Route::get('/seller/getproduct/{id}', 'SellerController@getProduct');
  // Route::post('/seller/product/{id}/statusupdate', 'SellerController@productStatusUpdate');

  Route::post('/seller/product/{id}/statusupdate', 'ProductController@productStatusUpdate');
  Route::get('/seller/getproduct/{id}', 'ProductController@getProduct');


 Route::get('/seller/{id}/getsellerprofile', 'SellerController@getsellerprofile');
  Route::post('/seller/{id}/update', 'SellerController@statusUpdate');

  Route::get('/seller/{id}/invoice/download', 'SellerController@pdfDownload');
  Route::get('/seller/address/{id}/delete', 'AddressController@destroy');
  Route::get('/seller/{id}/addresses', 'AddressController@index'); 
  Route::get('/seller/{userid}/address/{id}/edit', 'AddressController@edit'); 
 Route::post('/seller/{userid}/address/{id}/edit', 'AddressController@update');

   Route::post('/seller/delete', 'SellerController@destroy');
  Route::post('/seller/verify', 'SellerController@verifyCode');

  Route::get('/seller', 'SellerController@index');
  Route::get('/seller/{id}/details', 'SellerController@show');

  Route::get('/seller/{id}/edit', 'SellerController@edit'); 
  Route::post('/seller/{id}/edit', 'SellerController@update'); 


  Route::get('/seller/add', 'SellerController@create'); 
  Route::post('/seller/add', 'SellerController@store');
  
  Route::get('/seller/{id}/orders', 'OrderController@orders');
  Route::get('/seller/{id}/del_order', 'OrderController@delOrder');
  Route::post('/seller/orderitem/{id}/statusupdate', 'OrderController@updateStatus');

  Route::get('/seller/{id}/activities', 'SellerController@activities');
  Route::get('/seller/{id}/loginhistory', 'SellerController@loginhistory');
  // Route::get('/seller/{id}/store', 'SellerController@storeList');

  Route::get('/seller/{id}/store', 'StoreController@storeList');

  // Route::get('/seller/{id}/del_store', 'SellerController@delStore');

    Route::get('/seller/{id}/del_store', 'StoreController@delStore');

  // Route::get('/seller/{id}/product', 'SellerController@product');

  Route::get('/seller/{id}/product', 'ProductController@product');

  // Route::get('/seller/{id}/del_product', 'SellerController@delProduct');
    Route::get('/seller/{id}/del_product', 'ProductController@delProduct');
  
  Route::post('/seller/resetpassword', 'ResetPasswordController@resetpassword');

  Route::get('/seller/{id}/sendmail', 'MailMessageController@create');
  Route::post('/seller/{id}/sendmail', 'MailMessageController@SendMail');

});

Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Product'],function(){
 
  Route::get('/getproduct/{id}', 'ProductController@getProduct');
  Route::post('/product/{id}/statusupdate', 'ProductController@statusUpdate');


  Route::get('/product/pending', 'ProductController@pending');
  Route::get('/product/approve', 'ProductController@approve');
  Route::get('/product/cancel', 'ProductController@cancel');

  Route::get('/product/description/{slug}', 'ProductController@description');
  //Route::get('/product/{slug}/featuredproduct', 'ProductController@featuredproduct');
  Route::post('/product/featuredproduct', 'ProductController@updatefeaturedproducts');
  //Route::get('/product/description/{slug}', 'ProductController@description');
  Route::get('/product/orders/{slug}', 'ProductController@orders');
  Route::get('/product/reviews/{slug}', 'ProductController@reviews');

  Route::get('/product', 'ProductController@index');
});

Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Store'],function(){
 
  // Route::get('/store/pending', 'StoreController@pending');
  // Route::get('/store/approve', 'StoreController@approve');
  // Route::get('/store/cancel', 'StoreController@cancel');
  // Route::get('/store/details/{slug}', 'StoreController@view');
  Route::get('/store', 'StoreController@index');
  Route::get('/store/profile/{slug}', 'StoreController@profile');
  Route::get('/store/description/{slug}', 'StoreController@description');
  Route::get('/store/seller/{slug}', 'StoreController@seller');
  Route::get('/store/{id}/delete', 'StoreController@destroy');

});
Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin'],function(){
  // Route::get('/transaction/pending', 'TransactionController@pending');
  // Route::get('/transaction/approve', 'TransactionController@approve');
  // Route::get('/transaction/cancel', 'TransactionController@cancel');
  Route::get('/transaction/details/{id}', 'TransactionController@view');
  Route::get('/transaction', 'TransactionController@index');
});

Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Setting'],function(){
Route::get('/setting', 'SettingController@index');
Route::get('/setting/{id}/edit', 'SettingController@edit');
Route::post('/setting/{id}/edit', 'SettingController@update');
// Route::get('/setting/add', 'SettingController@create');
// Route::post('/setting/add', 'SettingController@store');
Route::get('/setting/{id}/delete', 'SettingController@destroy');


});

Route::group(['middleware'=>['auth','admin1'],
              'prefix'=>'admin',
              'namespace'=>'Admin\ShippingMethod'],function(){

Route::get('/shippingmethod','ShippingMethodController@index');
Route::get('/shippingmethod/add', 'ShippingMethodController@create'); 
Route::post('/shippingmethod/add', 'ShippingMethodController@store');
Route::get('/shippingmethod/{id}/edit', 'ShippingMethodController@edit');
Route::post('/shippingmethod/{id}/edit', 'ShippingMethodController@update');
Route::get('/shippingmethod/{id}/delete', 'ShippingMethodController@destroy');

 Route::get('/countryshippingmethod','CountryShippingMethodController@index');
 Route::get('/countryshippingmethod/{id}/attach','CountryShippingMethodController@create');
 Route::post('/countryshippingmethod/{id}/attach','CountryShippingMethodController@store');
//  Route::get('/countryshippingmethod/add', 'CountryShippingMethodController@create'); 
// Route::post('/countryshippingmethod/add', 'CountryShippingMethodController@store');
// Route::get('/countryshippingmethod/{id}/edit', 'CountryShippingMethodController@edit');
// Route::post('/countryshippingmethod/{id}/edit', 'CountryShippingMethodController@update');
// Route::get('/countryshippingmethod/{id}/delete', 'CountryShippingMethodController@destroy');

});

Route::group(['middleware'=>['auth','admin1'],
              'prefix'=>'admin',
              'namespace'=>'Admin\PaymentMethod'],function(){
 Route::get('/paymentmethod','PaymentMethodController@index');
 Route::get('/paymentmethod/add', 'PaymentMethodController@create'); 
Route::post('/paymentmethod/add', 'PaymentMethodController@store');
Route::get('/paymentmethod/{id}/edit', 'PaymentMethodController@edit');
Route::post('/paymentmethod/{id}/edit', 'PaymentMethodController@update');
Route::get('/paymentmethod/{id}/delete', 'PaymentMethodController@destroy');
 // Route::get('/countrypaymentmethod','CountryPaymentMethodController@index');
 // Route::get('/countrypaymentmethod/{id}/attach','CountryPaymentMethodController@create');
 // Route::post('/countrypaymentmethod/{id}/attach','CountryPaymentMethodController@store');

//  Route::get('/countryshippingmethod/add', 'CountryShippingMethodController@create'); 
// Route::post('/countryshippingmethod/add', 'CountryShippingMethodController@store');
// Route::get('/countryshippingmethod/{id}/edit', 'CountryShippingMethodController@edit');
// Route::post('/countryshippingmethod/{id}/edit', 'CountryShippingMethodController@update');
// Route::get('/countryshippingmethod/{id}/delete', 'CountryShippingMethodController@destroy');

});


Route::group(['middleware'=>['auth','admin1'],'prefix'=>'admin','namespace'=>'Admin\Review'],function(){

  Route::post('/reviews/edit', 'ReviewController@reviewUpdate'); 
  Route::get('/review/{id}/delete', 'ReviewController@delReview');
  Route::get('/reviews', 'ReviewController@reviews');


});
Route::get('/home', 'HomeController@index')->name('home');
