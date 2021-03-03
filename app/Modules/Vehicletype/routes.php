<?php

Route::group(['prefix' => 'vehicletype', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Vehicletype\Controllers'], function () {  
	//register
	Route::get('/','VehicletypeController@index');
	Route::get('/index','VehicletypeController@index');
	Route::get('/vehicletype_add','VehicletypeController@vehicletype_add');
	Route::get('/vehicletype_edit','VehicletypeController@vehicletype_edit');
	Route::get('/delete','VehicletypeController@vehicletype_delete');
	Route::post('/submit','VehicletypeController@vehicletype_create');
	Route::post('/update','VehicletypeController@vehicletype_update');
	//logout
	Route::get('/logout','VehicletypeController@logout');
	//rmSocialdata

});
 
