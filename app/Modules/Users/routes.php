<?php
 //'prevent-back-history'
Route::group(['prefix' => 'users', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Users\Controllers'], function () {
	
	//register
	Route::get('/','UsersController@index');
	Route::get('/index','UsersController@index');
	//Route::post('/search','UsersController@index')->name('search');
	Route::get('/users_add','UsersController@users_add');
	Route::get('/users_edit','UsersController@users_edit');
	Route::get('/profile','UsersController@profile');
	Route::get('/view','UsersController@view');

	Route::get('/get-city-list','UsersController@getCityList');
	
	Route::get('/delete','UsersController@deleteUser')->name('deleteUser');
	Route::post('/submit','UsersController@users_create');
	Route::post('/update','UsersController@users_update');
	Route::post('profile/update','UsersController@profile_update');
	
	Route::get('/rgsubmit','UsersController@otpError');
	Route::post('/rgsubmit','UsersController@registerSubmit');
	 
	//logout
	Route::get('/logout','UsersController@logout');
	//rmSocialdata
	Route::get('/rmSocialdata','UsersController@rmSocialdata');
	//resend otp
	Route::get('/resendotp','UsersController@resendOtp');
	//recieve otp
	Route::get('/recieveotp','UsersController@recieveOtp');
	//otp submit
	Route::post('/otpsubmit','UsersController@otpSubmit');
	Route::post('/update_social_login','UsersController@updateSocialLogin');
	//fb
	Route::get('/fb','UsersController@getLoginFacebook');
	//google
	Route::get('/google','UsersController@getLoginGoogle');
	Route::get('/redeemyes','ReferAndEarn@setRedeemYes');
	// return url
	Route::get('/socialAuth{auth?}','UsersController@socialLogin');

	Route::get('loadUsers', 'UsersController@loadUsers')->name('loadListing');

});
 
