<?php
//'web','prevent-back-history'
Route::group(['prefix' => 'dashboard', 'middleware' => ['web','auth'], 'namespace' => 'App\Modules\Dashboard\Controllers'], function () {
	//register
	Route::get('/','DashboardController@index');
    	Route::post('/','DashboardController@index');

	Route::get('/index','DashboardController@index');
	Route::get('/rgsubmit','DashboardController@otpError');
	Route::post('/rgsubmit','DashboardController@registerSubmit');
	//dashboard
	Route::get('/submit','DashboardController@otpError');
	Route::post('/submit','DashboardController@dashboardSubmit');
	//logout
	Route::get('/logout','DashboardController@logout');
	//rmSocialdata
	Route::get('/rmSocialdata','DashboardController@rmSocialdata');
	//resend otp
	Route::get('/resendotp','DashboardController@resendOtp');
	//recieve otp
	Route::get('/recieveotp','DashboardController@recieveOtp');
	//otp submit
	Route::post('/otpsubmit','DashboardController@otpSubmit');
	Route::post('/update_social_dashboard','DashboardController@updateSocialDashboard');
	//fb
	Route::get('/fb','DashboardController@getDashboardFacebook');
	//google
	Route::get('/google','DashboardController@getDashboardGoogle');
	Route::get('/redeemyes','ReferAndEarn@setRedeemYes');
	// return url
	Route::get('/socialAuth{auth?}','DashboardController@socialDashboard');

});
 
