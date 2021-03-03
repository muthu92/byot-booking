<?php 
 //'prevent-back-history'
Route::group(['prefix' => 'jobs', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Jobs\Controllers'], function () {
 	//register
	Route::get('/','JobsController@index');
	Route::get('/index','JobsController@index');
	Route::post('/assign_job','JobsController@assign_job');
	Route::post('/accept_auto','JobsController@accept_auto');
	Route::get('/jobs_edit','JobsController@hostel_edit');
	Route::get('/jobs_view','JobsController@hostel_view');
	Route::get('/delete','JobsController@deleteHostel');
	Route::post('/submit','JobsController@hostel_create');
	Route::post('/update','JobsController@hostel_update');
	 
	//logout
	Route::get('/logout','JobsController@logout');
	 
});
 
