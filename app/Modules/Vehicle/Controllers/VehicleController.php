<?php 
/*
* File Name: VehicleController.php
* Description: VehicleController is used to deal with vehicle master
 
*/
namespace App\Modules\Vehicle\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Vehicle\Models\Vehicle; 				// model of user table
use Validator;										// handle the request validator
use Illuminate\Http\Request;						// to handle the request data
use Auth;
use Config;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use Illuminate\Support\Facades\Hash;
class VehicleController extends Controller
{
	/*
	* index() is used to show the Category page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{

			 $Vehicle=new Vehicle();
			 $vehicle_list=$Vehicle::paginate();
			 $vehicletype_list=$Vehicle->vehicletype_list();
   
			 foreach($vehicletype_list as $key=>$value){
 			 $vehicletype_list[$value->id]=$value->name;	 
			 }
			return view('Vehicle::vehicle', [
            'vehicle_list' => $vehicle_list,
            'vehicletype_list' => $vehicletype_list,
        ]);
		}catch(\Exception $e){
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	public function vehicle_add(Request $request){
		 $category=new Vehicle();
	    
		$vehicletype_list=$category->vehicletype_list();
       		
		 return view('Vehicle::vehicle_add', [
            'vehicletype_list' => $vehicletype_list
        ]);
	}
	
	public function vehicle_edit(Request $request){
		 $category=new Vehicle();
	     $vehicletype_list=$category->vehicletype_list();
	     $vehicle_edit=$category->VehicleDetails($request->vehicle_id);
 		  
		 return view('Vehicle::vehicle_edit', [
            'vehicletype_list' => $vehicletype_list,
			'vehicle_edit' => $vehicle_edit
        ]);
	}
	public function deleteVehicle(Request $request){ 
	$Vehicle=new Vehicle();
	$category=$Vehicle->deleteVehicle($request->id);
	return redirect('vehicle');    
	}
	
	
	
	public function vehicle_create(Request $request){
		//print_r($request->all());
		$rules=[
		'vehicle_name' => 'required',
		'vehicle_type' => 'required',
		'vehicle_model' => 'required',
		'vehicle_no' => 'required',
		 
		];
		$messages = [
			'vehicle_name' => 'Please Enter Vehicle name',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Vehicle::vehicle_add');
		}  */	
 			$Users=new Vehicle();
			$VehicleData=$Users->ValidateVehicle($request->vehicle_no); 			
			if(count($VehicleData)>1){ // user exist more than 1
				$error="Invalid Vehicle no";
			}else if(count($VehicleData)==0){
					$instArr=array();
					$instArr["vehicle_name"]=$request->vehicle_name;
					$instArr["vehicle_type"]=$request->vehicle_type;
					$instArr["vehicle_model"]=$request->vehicle_model;
					$instArr["vehicle_no"]=$request->vehicle_no;
					 
					$instArr["created_at"]=date("Y-m-d H:i:s",time());
					$instArr["updated_at"]=date("Y-m-d H:i:s",time());
					 
					$add=$Users->addVehicle($instArr);
					$resp["status"]=0;
					$resp["msg"]="Vehicle Created";
					return redirect('vehicle');
			} 
	}
	public function Vehicle_update(Request $request){
		//print_r($request->all());
		$rules=[
		'vehicle_name' => 'required',
		'vehicle_type' => 'required',
		'vehicle_model' => 'required',
		'vehicle_no' => 'required',
		 
		];
		$messages = [
			'vehicle_name' => 'Please Enter Vehicle name',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Users::users_add');
		}  */		
			$Users=new Vehicle();
			$VehicleData=$Users->ValidateVehicle($request->vehicle_no,$request->vehicle_id); 			
			if(count($VehicleData)>1){ // user exist more than 1
				$error="Invalid Vehicle";
			}else if(count($VehicleData)==0){
					$instArr=array();
					$instArr["vehicle_name"]=$request->vehicle_name;
					$instArr["vehicle_type"]=$request->vehicle_type;
					$instArr["vehicle_model"]=$request->vehicle_model;
					$instArr["vehicle_no"]=$request->vehicle_no;
 					$instArr["updated_at"]=date("Y-m-d H:i:s",time());
					 
					$add=$Users->updateVehicle($instArr,$request->vehicle_id);
					$resp["status"]=0;
					$resp["msg"]="Vehicle Updated";
					return redirect('vehicle');
			} 
	}
	
 
}
