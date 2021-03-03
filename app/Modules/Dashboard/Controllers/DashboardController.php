<?php 

namespace App\Modules\Dashboard\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Dashboard\Models\Users; 				// model of user table
use Validator;										// handle the request validator
use Illuminate\Http\Request;						// to handle the request data
use Auth;
use Config;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use App\Modules\Dashboard\Models\Customer; 				// model of user table

class DashboardController extends Controller
{
	/*
	* index() is used to show the Dashboard page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{

			$dashboard=new Customer();
			$dashboardData=$dashboard->dashboardData();
			return view('Dashboard::dashboard',$dashboardData);
		}catch(\Exception $e){
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}


}
