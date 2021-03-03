<?php
//'prevent-back-history'
Route::group(['prefix' => 'login', 'middleware' => ['web'], 'namespace' => 'App\Modules\Login\Controllers'], function () {
	//register
	Route::get('/','LoginController@index');
	//login
	Route::get('/submit','LoginController@index');
	Route::post('/submit','LoginController@loginSubmit');
	//logout
	Route::get('/logout','LoginController@logout');
	

});
 
