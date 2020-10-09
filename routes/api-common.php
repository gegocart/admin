<?php
Route::group([
    'prefix' => 'auth',
    'namespace'=>'Auth',
    
   ], function () {
    Route::post('register', 'RegisterController@action');
    Route::post('login', 'LoginController@action');
    Route::post('buyerlogin', 'LoginController@actionbuyer');
    Route::post('sellerlogin', 'LoginController@actionseller');
    Route::get('me', 'MeController@action');//404 error
  });


Route::group([
    'prefix' => 'auth',
    'namespace'=>'Auth',
     'middleware'=>['jwt.auth'],
    
   ], function () {

  Route::post('update', 'LoginController@update');


});

Route::get('passwordchange', 'users\ForgotPasswordController@changepassword');
Route::post('passwordchange', 'users\ForgotPasswordController@passwordupdate');



 Route::get('displayquestion/{slug}/{page}', 'QuestionAnswer\QuestionAnswerController@index');


Route::group(['prefix' => 'users',
              'namespace'=>'Users',
             'middleware'=>['jwt.auth']], function () {  
    Route::get('getuserdetails', 'UserController@index');
    Route::get('getsellerdetails', 'UserController@sellerdetail');
  });

Route::group(['prefix' => 'users','namespace'=>'Users','middleware'=>['jwt.auth']], function () {
    Route::post('passwordchange', 'ForgotPasswordController@store');
    Route::post('updateuser', 'UserController@update');
});


Route::group(['prefix' => 'auth','namespace'=>'Auth'], function () {
    
 // Send reset password mail
    Route::post('userresetpassword', 'ForgotPasswordController@resetpassword'); //buyer
    Route::post('sellerresetpassword', 'ForgotPasswordController@sellerResetPassword'); //seller
});

