<?php 
/*
* File Name: LoginController.php
* Description: LoginController is used to deal with login/register
 
*/
namespace App\Modules\Login\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Login\Models\Users; 				// model of user table
use Validator;										// handle the request validator
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;						// to handle the request data
use Auth;
use Config;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
	/*
	* index() is used to show the login page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{
			if(Auth::check())
				return redirect()->intended('/dashboard');
			return view('Login::login');
		}catch(\Exception $e){
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	

	/*
	* loginSubmit() is used to submit the login to send otp
	* @param form submited data
	* @return array to the view
	*/
	public function loginSubmit(Request $request){
		$Login=new Users();
		$validator=$request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);
		
		try{
			$error="";
 
			if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
				$login_data=$Login->user_list($request->email);
 				Session::put('user_id', $login_data["id"]);
				Session::put('vehicle_id', $login_data["vehicle_id"]);
 
				//dd(Auth::user());
				return redirect('/dashboard');
			} else {
				$errors = ['password' => 'Invalid email id or password'];
				return redirect()->back()
				->withInput($request->only('email'))
				->withErrors($errors);
			}
		}catch(\Exception $e){
			Log::error('Login Submit Error: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	
	/*
	* logout() is used to logout
	* @param null
	* @return redirect to home page
	*/
	public function logout(Request $request){
		try{

			//Auth::logout(false);
			$request->session()->flush();
			return redirect('/');
		}catch(\Exception $e){
			Log::error('logout Error: '.$e->getMessage()); 				// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	
}
