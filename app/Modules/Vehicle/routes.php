<?php

Route::group(['prefix' => 'vehicle', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Vehicle\Controllers'], function () {  
	//register
	Route::get('/','VehicleController@index');
	Route::get('/index','VehicleController@index');
	Route::get('/vehicle_add','VehicleController@vehicle_add');
	Route::get('/vehicle_edit','VehicleController@vehicle_edit');
	Route::get('/delete','VehicleController@deleteVehicle');
	Route::post('/submit','VehicleController@vehicle_create');
	Route::post('/update','VehicleController@vehicle_update');
	
	
	//logout
	Route::get('/logout','VehicleController@logout');
	//rmSocialdata

});
 
