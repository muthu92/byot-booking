<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',array('as' => 'login', 'uses' =>'MainController@index'));

//Route::get('/jobs', 'PusherNotificationController@sendNotification');
Route::get('/notification', function () {
    return view('notification');
});

Route::get('send','PusherNotificationController@notification');
/*Route::get('/', function () {
    return view('welcome');
    //return view('Login::termsCondition');
});*/

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
