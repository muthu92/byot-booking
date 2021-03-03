<?php
 //'prevent-back-history'
Route::group(['prefix' => 'customer', 'middleware' => ['web'], 'namespace' => 'App\Modules\Customer\Controllers'], function () {
	
	Route::get('/','CustomerController@index');
	Route::get('/index','CustomerController@index');
	Route::get('/customer_add','CustomerController@customer_add');
	Route::get('/customer_edit','CustomerController@customer_edit');
	Route::get('/delete','CustomerController@deleteCustomer');
	Route::post('/submit','CustomerController@customer_create');
	Route::post('/update','CustomerController@customer_update');
	 
	 
});
 
