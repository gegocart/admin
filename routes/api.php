<?php

Route::get('/sellers', 'Users\SellerController@index'); //buyer
Route::get('/sellers/{name}', 'Users\SellerController@show'); //buyer
//Route::get('{slug}/ask-question', 'QuestionAnswer\QuestionAnswerController@question'); //buyer

Route::resource('categories', 'Categories\CategoryController'); //to check categories //buyer
Route::get('getcategorylist', 'Categories\CategoryController@getCategorylist');//seller
Route::get('buyermenucategorylist', 'Categories\CategoryController@getMenuCategorylist');//buyer

Route::resource('products', 'Products\ProductController');

Route::get('product/{slug}/getvariation', 'Products\ProductVariationController@getVariation');

Route::get('products/lowtohigh', 'Products\ProductSearchController@pricefilter');
//Route::get('questoionanswer', 'QuestionAnswerwer\QusetionAnswerController@qa');

//Route::get('getproductdetail/{slug}', 'Products\ProductController@showproductdetail');

// Route::resource('productcategory', 'Products\ProductController@getProductCategory');
//Route::resource('stores', 'stores\StoreController');



Route::get('categories/{slug}', 'Categories\CategoryController@show'); //buyer

Route::get('subcategory', 'Categories\CategoryController@getsubcategory'); //seller,buyer
Route::get('activecategory', 'Categories\CategoryController@activecategory');

Route::get('getcategory/{slug}', 'Categories\CategoryController@getCategory');

///Route::get('getsubcategory', 'Categories\CategoryController@getsubcategory');





Route::resource('countries', 'Countries\CountryController');
Route::get('regions/{country_id}', 'Countries\CountryController@getRegion');
Route::get('countryshippingmethod', 'Countries\CountryController@displayCountryShippingMethod');

Route::get('states/pincode/{countryid}', 'Countries\CountryController@getStatepincode');
Route::get('states/{countryid}', 'Countries\CountryController@getState');
Route::get('cities/{stateid}', 'Countries\CountryController@getCity');
Route::post('loadcities', 'Countries\CountryController@loadCity');


Route::post('storestatus', 'Orders\OrderController@storeorderstatus');//seller

//Route::post('storerefund', 'Orders\TransactionController@storerefund');//seller

Route::resource('payment-methods', 'PaymentMethods\PaymentMethodController');
Route::get('paymentmethods', 'PaymentMethods\PaymentMethodController@show');//buyer



//Route::get('productcategory', 'Products\ProductController@getProductCategory'); //seller

//Route::get('attributesetcategory', 'Attributes\AttributesetController@getAttributes');
Route::get('attributes/{categoryid}', 'Attributes\AttributesetController@displayAttributes');//seller
//Route::get('productvariation/{productid}', 'Attributes\AttributesetController@getProductVariationlist');


Route::get('cms/{slug}', 'Page\PageController@show');//buyer

// Route::group(['prefix' => 'categories'], function () {


// });

include('api-common.php');
include('api-order.php');
include('api-seller.php');

Route::group(['prefix' => 'invoice',
                'middleware'=>['jwt.auth'],
              ], function () {
   //Route::get('getinvoiceno', 'Invoice\InvoiceController@getInvoicenumber');
   Route::post('createinvoice', 'Invoice\InvoiceController@store'); //seller
  Route::get('getinvoicedetail/{orderid}/{userid}/{orderitemid}/{sellerid}', 'Invoice\InvoiceController@show_Invoicedetails'); //buyer
   Route::post('savepdfstring','Invoice\InvoiceController@saveinvoicepdfbase64string');//buyer//no data
});

Route::get('product/download/{id}','Products\ProductController@download');

Route::group(['prefix' => 'invoice',
              ], function () {
  Route::get('invoicedetailtest/{orderid}/{userid}/{orderitemid}/{sellerid}', 'Invoice\InvoiceController@invoicepdf_test'); //testing purpose
  });



Route::group(['prefix' => 'seller',
              'namespace'  => 'Seller',
             'middleware'=>['jwt.auth'],
], function () {

Route::post('searchquestion', 'QuestionAnswerController@searchquestion');
});

Route::group(['prefix' => 'seller',
              'namespace'  => 'Seller',

], function () {
    Route::get('displaycategory', 'CategoryController@displaycategory');

    Route::get('searchcategory', 'CategoryController@searchcategory');
    Route::post('searchcategory', 'CategoryController@searchcategory');



    Route::post('storecategory', 'CategoryController@store');
    Route::get('editcategory/{categoryid}', 'CategoryController@edit');
    Route::post('editcategory/{categoryid}', 'CategoryController@update');
    Route::get('deletecategory/{categoryid}', 'CategoryController@destroy');


     //subcategory
    Route::get('displaysubcategory/{categoryid}', 'SubCategoryController@displaysubcategory');
    Route::post('searchsubcategory/{categoryid}', 'SubCategoryController@searchsubcategory');
    Route::post('storesubcategory', 'SubCategoryController@store');
    Route::get('editsubcategory/{categoryid}', 'SubCategoryController@edit');
    Route::post('editsubcategory/{categoryid}', 'SubCategoryController@update');
    Route::get('deletesubcategory/{categoryid}', 'SubCategoryController@destroy');

    //attributecode
    Route::get('displayattributecode', 'AttributeCodeController@index');
    //Route::post('searchattributecode/{id}', 'SubCategoryController@searchsubcategory');
    Route::post('storeattributecode', 'AttributeCodeController@store');
    Route::get('geteditattributecode/{id}', 'AttributeCodeController@edit');
    Route::post('editattributecode/{id}', 'AttributeCodeController@update');
    Route::get('deleteattributecode/{id}', 'AttributeCodeController@destroy');
});



//Route::get('subcategorycount/{categoryid}', 'Seller\CategoryController@getsubcategorycount');

//buyer
Route::resource('cart', 'Cart\CartController', [
    'parameters' => [
        'cart' => 'productVariation'
    ]
]);

//buyer
Route::group(['prefix' => 'rating',
              'namespace'  => 'Rating',
              'middleware'=>['jwt.auth']
], function () {
Route::get('getrating/{productid}', 'RatingReviewController@index');
Route::post('addrating', 'RatingReviewController@store');
});

Route::group([
              'namespace'  => 'QuestionAnswer',
              'middleware'=>['jwt.auth'],
], function () {
Route::post('addquestion', 'QuestionAnswerController@store');
});
//buyer
Route::group(['prefix' => 'paymentmethods',
'namespace'=>'PaymentMethods',
], function () {
  // Route::post('payment/status', 'PaymentMethods\PayTmController@paymentCallback');
   Route::post('orderpaytm', 'PayTmController@order');
   Route::post('paytmparams', 'PayTmController@paytmkey');
   Route::post('payment/status', 'PayTmController@paymentCallback');
    Route::get('paytmnew', 'PayTmController@paytmCheckSumNew');
   // Route::get('getCURL', 'PaymentMethods\PayTmController@getCURL');
   // Route::post('getresponse/{url}/{data}', 'PaymentMethods\PayTmController@getPostResponse');
    //Route::post('payu','PayUController@store');

});

Route::post('addcontact','Contact\ContactController@store');


Route::group(['prefix' => 'tax',
              'namespace'  => 'Tax',
], function () {
    Route::get('displaytax', 'TaxTypeController@index');
});


Route::group(['prefix' => 'settings',
              'namespace'  => 'Settings',
              'middleware'=>['jwt.auth']
], function () {
    Route::get('displaypincode', 'PincodeController@index');
    Route::post('storepincode', 'PincodeController@store');
    Route::post('storemultiplepincode', 'PincodeController@storemultiplepincode');
    Route::get('pincodelist/{id}', 'PincodeController@edit');
    Route::post('editpincode/{id}', 'PincodeController@update');
    Route::get('deletepincode/{id}', 'PincodeController@destroy');

    Route::get('displayregion', 'RegionController@index');
    Route::post('storeregion', 'RegionController@store');
    Route::get('displayregionname', 'RegionController@getRegionNamelist');

    Route::post('searchregionlist', 'RegionController@searchregionlist');

    Route::get('getpincodelists/{regionid}', 'RegionController@getPincodelist');



    Route::get('getstatecitylist/{regionid}', 'RegionController@getStateCitylist');
    Route::get('getregionbyid/{id}', 'RegionController@edit');
    Route::post('updateregion/{id}', 'RegionController@update');
    Route::get('deleteregion/{id}', 'RegionController@destroy');
    Route::get('pincodeavailable/{seller_id}/{pincode}', 'RegionController@pincodecheck');


    Route::get('getfeedata', 'SellerBalanceController@displayFee');
    Route::get('displayfeedetails/{grams}/{itemsize}/{scope}', 'SellerBalanceController@feedetails');


});

 Route::get('/settings/pincodelists/update', 'Settings\RegionController@updatePincode');



Route::get('sellerdetailbalance', 'Seller\DashboardController@sellerBalanceDetail');


Route::get('/getimages', 'Giftcard\GiftCardController@index');



