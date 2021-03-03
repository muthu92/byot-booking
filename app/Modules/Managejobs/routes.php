<?php 
 //'prevent-back-history'
Route::group(['prefix' => 'managejobs', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Managejobs\Controllers'], function () {
 	//register
	Route::get('/','ManagejobsController@index');
	Route::get('/index','ManagejobsController@index');
	Route::post('/assign_job','ManagejobsController@assign_job');
	Route::post('/accept_auto','ManagejobsController@accept_auto');
	 
	Route::get('/delete','ManagejobsController@deleteHostel');

	//logout
	Route::get('/logout','ManagejobsController@logout');
	 
});
 
