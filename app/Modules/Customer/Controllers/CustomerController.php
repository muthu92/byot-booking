<?php 
/*
* File Name: CustomerController.php
* Description: CustomerController is used to deal with login/register
 
*/
namespace App\Modules\Customer\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Customer\Models\Customer; 				// model of customer table

use Validator;										// handle the request validator
use Illuminate\Http\Request;						// to handle the request data
use Config;
//use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use Illuminate\Support\Facades\Hash;
use \Crypt;
use Stevebauman\Location\Facades\Location;
use App\Events\TestEvent;
use Pusher\Pusher;
 class CustomerController extends Controller
{
	/*
	* index() is used to show the Customer page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{ 
 			 $Customer=new Customer();
			//event(new TestEvent('a@a.com'));

   			$customer_list=$Customer->customer_list();
 			return view('Customer::customer', [
            'customer_list' => $customer_list
         ]);
		}catch(\Exception $e){
			print_r($e->getMessage());
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	public function customer_add(Request $request){
		$Hostel=new Hostel();
		$hostel_list=$Hostel->hostel_list();
		 return view('Customer::customer_add',[
            'hostel_list' => $hostel_list
        ]);
	}
	public function deleteCustomer(Request $request){ 
	$customer=new Customer();
	$category=$customer->deleteCustomer($request->id);
	return redirect('customer');    
	}

	public function customer_edit(Request $request){
		$Customer=new Customer();
		$customer_edit=$Customer->customerDetails($request->customer_id);
		  
 		 return view('Customer::customer_edit', [
            'customer_edit' => $customer_edit
        ]);
	}
	public function IPv4To6($ip) {
 $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if (isset($_SERVER['HTTP_FORWARDED_FOR'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if (isset($_SERVER['HTTP_FORWARDED'])) {
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if (isset($_SERVER['REMOTE_ADDR'])) {
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
        $ipaddress = 'UNKNOWN';
    }

    return $ipaddress;
}
	public function customer_create(Request $request){
	 
/* $user_ip = getenv('REMOTE_ADDR');
$user_ip = getHostByName(getHostName());
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));
 
$vaa=$this->IPv4To6($user_ip);
		
		$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
		 $localIP = getHostByName(getHostName());
		//$ip = '103.239.147.187'; //For static IP address get
        $ip = request()->ip(); //Dynamic IP address get
		
		//print_r($var);

	$data = \Location::get("192.168.43.24"); 
	
 */	
 
	$Customer=new Customer();
      
	$rules=[
		'customer_name' => 'required',
		'email_id' => 'required',
		'mobile_no' => 'required',
		'pickup_date' => 'required',
  		];
		$messages = [];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Users::users_add');
		}  */		
			
		$customerData=$Customer->ValidateCustomer($request->email_id,$request->mobile_no); 	
	$booking_list=$Customer->booking_list(); 
 
  			if(count($customerData)>0){ // user exist more than 1
 				$customer_id=$customerData[0]->id;
			}else if(count($customerData)==0){
					$instArr=array();
					$instArr["name"]=$request->customer_name;
					$instArr["mobile_no"]=$request->mobile_no;
					$instArr["email_id"]=$request->email_id;
					$instArr["latitude"]=$request->latitude;
					$instArr["longitude"]=$request->longitude;
  					$instArr["created_at"]=date("Y-m-d H:i:s",time());
 				$customer_id=$Customer->addCustomer($instArr);
					
			}
		$code = 'BY';
		$date = date('ymd');
		if(count($booking_list)==0)
		$seq  = 1;
	else
		$seq  = count($booking_list)+1;
		
		$booking_no = sprintf('%s%s %04d', $code, $date, $seq);
 			if(!empty($customer_id)){
				$instArr=array();
				$instArr["customer_id"]=$customer_id;
				$instArr["pickup_latitude"]=$request->latitude;
				$instArr["pickup_longitude"]=$request->longitude;
				$instArr["drop_latitude"]=$request->latitude;
				$instArr["drob_longitude"]=$request->longitude;
				$instArr["pickup_location"]=$request->pickup;
				$instArr["drop_location"]=$request->drop;
				$instArr["pickup_date"]=date("Y-m-d H:i:s",strtotime($request->pickup_date));
				$instArr["status"]=0;
				$instArr["booking_no"]=$booking_no;
				$instArr["created_at"]=date("Y-m-d H:i:s",time());
 				$booking=$Customer->addBooking($instArr);
				$options = array(
	'cluster' => 'ap2',
	'encrypted' => true
	);
	$pusher = new Pusher(
	'a0431439590a90562551',
	'91bc8af3cb197ff17e96',
	'1163782', $options
	);
	//$data['booking_id'] = $booking_id;
	$data['booking_id'] = $booking;
	$data['message'] = 'book This';

	//Send a message to notify channel with an event name of notify-event
	$pusher->trigger('notification', 'App\\Events\\TestEvent', $data); 
	session()->flash('message', 'Booking was Processed!');
	return redirect('customer');
			}
	}
	
 
}
