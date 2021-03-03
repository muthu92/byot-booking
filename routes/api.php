<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Login & Registration
Route::post('login','Api\UserController@login');   
Route::post('register','Api\UserController@register');
// OTP
Route::post('sendotp','Api\UserController@sendotp');
Route::post('otp_verification','Api\UserController@otp_verification');

// Forgot Password
Route::post('forgot_password', 'Api\ForgotPasswordController@forgot_password');
Route::post('check_otp', 'Api\ForgotPasswordController@check_otp');
Route::post('reset_password', 'Api\ForgotPasswordController@reset_password');

// Logout 
Route::get('logout', 'Api\UserController@logout')->middleware('auth:api');

/*--Customer-----------------------------------------------------*/
// Login & Registration
Route::post('customer_login','Api\CustomerController@login');   
Route::post('register_customer','Api\CustomerController@register');
// OTP
Route::post('customer_otp_verification','Api\CustomerController@otp_verification');

/*// Forgot Password
Route::post('forgot_password', 'Api\ForgotPasswordController@forgot_password');
Route::post('check_otp', 'Api\ForgotPasswordController@check_otp');
Route::post('reset_password', 'Api\ForgotPasswordController@reset_password');*/

// Logout 
Route::get('customer_logout', 'Api\CustomerController@logout')->middleware('auth:api');
/*---------------------------------------------------------------*/

// Profile
Route::post('profile','Api\UserController@profile')->middleware('auth:api');

// Sub Category
Route::get('subcategory_list','Api\SubCategory_Controller@index')->middleware('auth:api');  
Route::post('subcategory','Api\SubCategory_Controller@store')->middleware('auth:api');  
Route::post('update_subcategory','Api\SubCategory_Controller@update')->middleware('auth:api');  
Route::get('delete_subcategory/{id}','Api\SubCategory_Controller@destroy')->middleware('auth:api');

// Hostel
Route::get('hostel_list','Api\HostelController@index');  
Route::get('hostels','Api\HostelController@index')->middleware('auth:api');  
Route::post('hostel','Api\HostelController@store')->middleware('auth:api');  
Route::get('view_hostel/{id}','Api\HostelController@show')->middleware('auth:api');  
Route::post('update_hostel','Api\HostelController@update')->middleware('auth:api');  
Route::get('delete_hostel/{id}','Api\HostelController@destroy')->middleware('auth:api');  

// Room_Booking
Route::get('booked_rooms','Api\Room_BookingController@index')->middleware('auth:api');  
Route::post('room_booking','Api\Room_BookingController@store')->middleware('auth:api');  
Route::get('view_room/{id}','Api\Room_BookingController@show')->middleware('auth:api');  
Route::post('update_room_booking','Api\Room_BookingController@update')->middleware('auth:api');  
Route::get('delete_room_booking/{id}','Api\Room_BookingController@destroy')->middleware('auth:api');

// Room Management
Route::get('room_list','Api\Room_ManagementController@index')->middleware('auth:api');  
Route::post('book_room','Api\Room_ManagementController@store')->middleware('auth:api');  
Route::get('view_room/{id}','Api\Room_ManagementController@show')->middleware('auth:api');  
Route::post('update_room','Api\Room_ManagementController@update')->middleware('auth:api');  
Route::get('delete_room/{id}','Api\Room_ManagementController@destroy')->middleware('auth:api');  

// Search
Route::post('search_nearby','Api\FrontController@search_nearby')->middleware('auth:api');  
Route::post('search_hostel','Api\FrontController@search_hostel')->middleware('auth:api');  
Route::get('category_count','Api\FrontController@index')->middleware('auth:api');  

// Related Hostels
Route::get('releated_hostel','Api\FrontController@releated_hostel')->middleware('auth:api');  

// City list
/*Route::get('city_list','Api\FrontController@city_list')->middleware('auth:api');  */
Route::get('city_list','Api\FrontController@city_list');  

//  Stay category
Route::get('staycategory_list','Api\StayCategoryController@index');

// Rating
Route::get('rating_list','Api\RatingController@index')->middleware('auth:api');  
Route::post('rating','Api\RatingController@store')->middleware('auth:api');  
Route::post('update_rating','Api\RatingController@update')->middleware('auth:api');  
Route::get('delete_rating/{id}','Api\RatingController@destroy')->middleware('auth:api');

// Filter 
// Route::get('search/{nearby}/{category}/{looking_for}','Api\FrontController@search');  
Route::get('search','Api\FrontController@search');  

// Staycategory Count
Route::get('staycatagory_count','Api\StayCategoryController@catagory_count');
Route::post('staycatagory','Api\StayCategoryController@store');
Route::post('staycatagory_update','Api\StayCategoryController@update');
Route::get('delete_category/{id}','Api\StayCategoryController@destroy');