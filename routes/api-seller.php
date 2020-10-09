<?php
//stores
Route::group(['prefix' => 'stores',
	'namespace'=>'stores',
	'middleware'=>['jwt.auth']
], function () {

    Route::get('/{slug}', 'StoreBuyerController@show');//check
    Route::post('addstores', 'StoreController@store');
    Route::get('editstores/{storeid}', 'StoreController@edit');
    Route::post('editstores/{storeid}', 'StoreController@update');
    Route::get('deletestores/{storeid}', 'StoreController@destroy');
    Route::get('show/mystores', 'StoreController@mystores');//seller
    
   Route::get('searchstores', 'StoreController@searchstores');
   Route::post('searchstores', 'StoreController@searchstores');

});

Route::get('storeproduct/{storeslug}', 'stores\StoreBuyerController@getstoreproduct'); //buyer
Route::get('store/product/searchprice/{min}/{max}', 'stores\StoreBuyerController@searchPrice');//buyer
Route::get('store/product/ratingfilter', 'stores\StoreBuyerController@ratingFilter');//buyer
Route::get('store/product/filter', 'stores\StoreBuyerController@filter');//buyer
Route::get('getstore/{slug}', 'stores\StoreBuyerController@getStore');//buyer
Route::get('activestores', 'stores\StoreBuyerController@activestores');//buyer

Route::get('store/product/brandfilter', 'stores\StoreBuyerController@brandFilter');//buyer


Route::group(['prefix' => 'products',
	         'namespace'=>'Products',
		       'middleware'=>['jwt.auth']
], function () {
  Route::get('getmyproducts', 'ProductController@myproducts');
			Route::get('displayproducts', 'ProductController@show');
			Route::get('getproductdetail/{slug}/{userid}', 'ProductCategoryController@showproductdetail');

			Route::post('addproducts', 'ProductAttributeStoreController@store');

			Route::post('addproductAttribute', 'ProductController@storeproductAttributeAdd');
 
			Route::get('editproducts/{productid}', 'ProductAttributeStoreController@edit');
 

			Route::post('editproducts/{productid}', 'ProductAttributeStoreController@update');

			Route::get('deleteproducts/{productid}', 'ProductController@destroy');

			Route::get('deleteproductimage/{id}/{productid}', 'ProductFeatureController@delete_getProductGallery');

			
			Route::get('displayattributeproduct/{productid}', 'ProductVariationController@getAttributeProduct');
			Route::get('productvariationlist/{productid}', 'ProductVariationController@getProductVariation');

      Route::post('productcategory', 'ProductCategoryController@getProductCategory'); //seller
      Route::post('productcategorysearch', 'ProductCategoryController@searchproduct');//seller

      Route::post('searchproduct', 'ProductSearchController@searchproductdetail');//seller
            // Route::get('featuredproducts', 'ProductFeatureController@featuredproduct');


//wishlist
 
//  Route::get('/getmywishlist', 'WishListController@getwishlist');
//  Route::post('/addwishlist', 'WishListController@store');


// Route::get('/wishlist/{id}/remove', 'WishListController@destroy');
// Route::post('/wishlist/rename', 'WishListController@update');

// Route::post('/wishitem/add', 'WishListItemController@store');
// Route::post('/wishlistitem/move', 'WishListItemController@move');
// Route::get('/getmywishlistitem',     'WishListItemController@index');
// Route::get('/wishlistitem/{id}/remove',     'WishListItemController@destroy');


});

 Route::get('featuredproducts', 'Products\ProductFeatureController@featuredproduct');
Route::group([
           'namespace'=>'Products',
         'middleware'=>['jwt.auth']
], function () {
  Route::get('getauthname','ProductController@getAuthName');
});




Route::group(['prefix' => 'products',
           'namespace'=>'Products',
        
], function () {
      Route::get('pricefilter/{min}/{max}', 'ProductSearchController@searchPrice');

     Route::get('category/pricefilter/{min}/{max}', 'ProductSearchController@categoryPriceSearch');

      Route::get('searchbrand/{searchbrand}', 'ProductSearchController@searchBrand');
     Route::get('pricelow/pricefilter', 'ProductSearchController@getlowpricefilter');
     Route::get('pricehigh/pricefilter', 'ProductSearchController@highpricefilter');
     Route::get('source', 'ProductSourceController@uploads');

    
  });
   
   Route::get('brands', 'Categories\BrandController@index');
   Route::get('getbrands', 'Categories\BrandController@getBrands');
   Route::get('store/product/brands', 'Categories\BrandController@getStoreBrand');
   Route::get('category/brands', 'Categories\BrandController@getcategoryBrand');
   Route::get('category/products/{brand}', 'Products\ProductSearchController@categoryProductBrandFilter'); 


  Route::get('/seller/product/{param}/{userid}/getqusandans/{paginate}', 'Seller\QuestionAnswerController@getqusandans');
 
  Route::get('products/ratingfilter/{rating}', 'Products\ProductSearchController@ratingfilter');
  Route::get('products/category/ratingfilter/{rating}', 'Products\ProductSearchController@categoryProductRatingFilter');
     



Route::group(['prefix' => 'seller',
	         'namespace'=>'Seller',
		      'middleware'=>['jwt.auth']
], function () {
    
    Route::get('/products', 'DashboardController@productcount');
    Route::get('/stores', 'DashboardController@storecount');
    Route::get('/orders', 'DashboardController@ordercount');
    Route::get('/amount', 'DashboardController@orderamount');

    Route::get('/pendingorders', 'DashboardController@pendingorders');
    Route::get('/activeproducts', 'DashboardController@activeproducts');
    Route::get('/inactiveproducts', 'DashboardController@inactiveproducts');
    Route::get('/orderamount', 'DashboardController@orderamount');
    Route::get('/orderstatusdetail', 'DashboardController@orderstatus');

    Route::get('/dashboard/getproducts', 'DashboardController@getproducts');    

    Route::get('/rating', 'DashboardController@rating');
    Route::get('/sellerbalance', 'DashboardController@getsellerBalance');//error
 
    Route::get('/productstock/{userid}', 'DashboardController@stock_lowest');

    //attribute
    Route::get('displayattributes', 'AttributeController@diplayattributes');
 
    Route::post('searchattributes', 'AttributeController@searchattributes');
    Route::post('storeattribute', 'AttributeController@store');

    Route::get('editattribute/{id}', 'AttributeController@edit');
    Route::post('editattribute/{id}', 'AttributeController@update');
    Route::get('deleteattribute/{id}', 'AttributeController@destroy');

    //attributesetcategory
    Route::get('displayattributesetcategory', 'AttributesetCategoryController@getattributesetcategory');
    Route::get('attributesetcategorylist', 'AttributesetCategoryController@displayattributesetcategory');
    Route::post('storeattributesetcategory', 'AttributesetCategoryController@store');
    Route::get('editattributesetcategory/{id}', 'AttributesetCategoryController@edit');
    Route::post('editattributesetcategory/{id}', 'AttributesetCategoryController@update');
    Route::get('deleteattributesetcategory/{id}', 'AttributesetCategoryController@destroy');
    Route::post('searchattributesetcategory', 'AttributesetCategoryController@searchattributesetcategory');


     //attributeset
    Route::get('displayattributeset', 'AttributesetController@displayattributeset');
    Route::post('searchattributeset', 'AttributesetController@searchattributeset');
    Route::get('getattributeset', 'AttributesetController@getattributeset');
    
    Route::post('storeattributeset', 'AttributesetController@store');
    Route::get('editattributeset/{id}', 'AttributesetController@edit');
    Route::post('editattributeset/{id}', 'AttributesetController@update');
    Route::get('deleteattributeset/{id}', 'AttributesetController@destroy');

    //Route::get('displaysellerdetails','SellerProfileController@index');

    //question add,edit,delete
    Route::post('storeanswer', 'QuestionAnswerController@storeanswer');
    Route::get('displayquestion', 'QuestionAnswerController@index');
    Route::get('editanswer/{id}', 'QuestionAnswerController@edit');
    Route::post('updateanswer/{id}', 'QuestionAnswerController@updateanswer');
    Route::get('deleteanswer/{id}', 'QuestionAnswerController@destroy');

   
   });

Route::group(['prefix' => 'seller',
           'namespace'=>'Seller',
], function () {
   Route::post('storesellerregistration', 'SellerProfileController@store');

});

Route::group(['prefix'=>'attributes',
               'namespace'=>'Attributes',
               'middleware'=>['jwt.auth']
 ],function(){
   Route::post('attributeproductstore/{count}', 'AttributesetController@store');//seller
  Route::post('updateattributeproduct', 'AttributesetController@update');//seller
 });

// Route::group([ 
                 
//                 'namespace'=>'Products',
//               'middleware'=>['jwt.auth'],   
// ], function () {
//   Route::get('price', 'ProductSearchController@searchPrice');
           
// });
Route::group([ 
                'prefix' => 'wishlist',
                'namespace'=>'Products',
              'middleware'=>['jwt.auth'],   
], function () {
  
Route::post('rename', 'WishListController@update');
Route::post('/addwishlist', 'WishListController@store');
Route::get('getmywishlist', 'WishListController@getwishlist');
Route::get('/{id}/remove', 'WishListController@destroy');
Route::post('wishitem/add', 'WishListItemController@store');
Route::post('wishlistitem/move', 'WishListItemController@move');
Route::get('getmywishlistitem',     'WishListItemController@index');
Route::get('filterproduct/{sortby}',     'WishListItemController@getlowpriceproduct');
Route::get('/wishlistitem/{id}/remove',     'WishListItemController@destroy');

});
Route::group([  'prefix'=>'settings',
                'namespace'=>'Settings',
              'middleware'=>['jwt.auth']
], function () {

   Route::post('profileimage/update', 'SettingsController@store');
   Route::get('/getactivelog', 'SettingsController@getActiveLog');


});

