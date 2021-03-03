<?php 
/*
* File Name: JobsController.php
* Description: JobsController is used to deal with login/register
 
*/
namespace App\Modules\Managejobs\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Managejobs\Models\Managejobs; 				// model of user table
use App\Modules\Users\Models\Users; 				// model of user table
use Validator;										// handle the request validator
use Illuminate\Http\Request;						// to handle the request data
use Auth;
use Config;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use \Crypt;
use DB;
class ManagejobsController extends Controller
{
	/*
	* index() is used to show the Hostel page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{ 
		    
 			 $Managejobs=new Managejobs();
 			//$jobs_list=$Jobs->jobs_list(); 
			$job_list=$Managejobs->job_list(); 
			 $jobs_list = Managejobs::leftjoin('vehicle','vehicle.id','=','booking.vehicle_id')
			  ->leftjoin('vehicle_type','vehicle_type.id','=','vehicle.vehicle_type')
			 ->leftjoin('customers','customers.id','=','booking.customer_id')
			 ->leftjoin('users','users.id','=','booking.job_assistance')
			 ->select('customers.name as customer_name','customers.mobile_no as mobile_no','vehicle.vehicle_name as vehicle_name','vehicle_type.name as vehicle_type','vehicle.vehicle_model as vehicle_model',
			 'vehicle.vehicle_no as vehicle_no','booking.customer_id','booking.pickup_location','booking.drop_location','booking.pickup_date','booking.booking_no','booking.status','booking.id','booking.trip_id','users.name as job_assistance','booking.created_at')
			 ->orderBy('booking.status', 'asc')
			 ->orderBy('booking.id', 'DESC')
			 
			 ->paginate(10);
  			return view('Managejobs::managejobs', [
            'jobs_list' => $jobs_list,
            'job_list' => $job_list,
        ]);
		}catch(\Exception $e){
			print_r($e->getMessage());
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
  
	public function assign_job(Request $request){
   	$Jobs=new Managejobs();
 	if($request->status==1){
		$instArr=array(); 
		$instArr["status"]=$request->status;
		$fourRandomDigit = mt_rand(1000,9999);
		$instArr["trip_id"]=$fourRandomDigit;
		$instArr["job_assistance"]=$request->job_assistance;
		$instArr["vehicle_id"]=Session::get('vehicle_id');
		$accept=$Jobs->accept_booking($instArr,$request->id);
		$data["msg"]="Success";
	}else{
	$data["msg"]="Rejected";
	}
	echo json_encode($data["msg"]);
	
	}
	public function accept_auto(Request $request){ 
 	$Jobs=new Managejobs();
	$instArr=array();
	$booking=$Jobs->Checkbooking($request->booking_id);
	$customer=$Jobs->customer_list($booking[0]->customer_id);
	$booking[0]->customer_id=$customer[0]->name;
	
	 echo json_encode($booking);
	}
}
