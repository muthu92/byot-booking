<?php 
/*
* File Name: vehicletypeController.php
* Description: vehicletypeController is used to deal with login/register
 
*/
namespace App\Modules\Vehicletype\Controllers;
use App\Http\Controllers\Controller;				// controller lib
use App\Modules\Vehicletype\Models\Vehicletype; 				// model of user table
use Validator;										// handle the request validator
use Illuminate\Http\Request;						// to handle the request data
use Auth;
use Config;
use Session;
use URL;
use Redirect;
use Illuminate\Support\Facades\Log;					// log for exception handling
use Illuminate\Support\Facades\Hash;
class vehicletypeController extends Controller
{
	/*
	* index() is used to show the Category page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{
			 $vehicletype=new Vehicletype();
			 $vehicletype_list=$vehicletype::paginate(10);
			 foreach($vehicletype_list as $key=>$value){
		     if(!empty($value->file_id)){
					$image=$vehicletype->vehicletype_file($value->file_id);
 				 $vehicletype_list[$key]["file_path"]="uploads/".$image[0]->file_path;
				 }else
					 $vehicletype_list[$key]["file_path"]='';		 
			 
			 }
			 
			return view('Vehicletype::vehicletype', [
            'vehicletype_list' => $vehicletype_list
        ]);
		}catch(\Exception $e){
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}
	public function vehicletype_add(Request $request){
		 return view('Vehicletype::vehicletype_add');
	}
	public function vehicletype_edit(Request $request){
		$vehicletype=new Vehicletype();
		$vehicletype_edit=$vehicletype->vehicletypeDetails($request->vehicletype_id);
		 return view('Vehicletype::vehicletype_edit', [
            'vehicletype_edit' => $vehicletype_edit
        ]);
	}
	public function vehicletype_delete(Request $request){ 
		$vehicletype = Vehicletype::find($request->id);
		if($vehicletype->delete()){
			return redirect('vehicletype');    
		}
	}
	public function vehicletype_create(Request $request){
		$rules=[
		'name' => 'required',
		 
		];
		$messages = [
			'name' => 'Please Enter vehicle type',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
        		
			$Vehicletype=new Vehicletype();
			$vehicletypeData=$Vehicletype->Validatevehicletype($request->name);
 			
			if(count($vehicletypeData)>1){ // user exist more than 1
				$error="Invalid vehicle type";
			}else{ 
		
	 
	$instArr=array();
	$instArr["name"]=$request->name;					 
	$instArr["created_at"]=date("Y-m-d H:i:s",time());
 	$instArr["status"]=$request->status;
	$add=$Vehicletype->addvehicletype($instArr);
	$resp["status"]=0;
	$resp["msg"]="Vehicle type Created";
	return redirect('vehicletype');
			}
			
		// return view('Users::users_add');
	}
	
	public function vehicletype_update(Request $request){
		//print_r($request->all());
		$rules=[
		'name' => 'required',
		 
		];
		$messages = [
			'name' => 'Please EnterVehicle Type',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		 	
			$Users=new Vehicletype();
			$vehicletypeData=$Users->Validatevehicletype($request->name,$request->vehicletype_id);
 			
			if(count($vehicletypeData)>1){
				$error="Invalid vehicletype";
			}else if(count($vehicletypeData)==0){
	  
	$instArr=array();
	$instArr["name"]=$request->name;					 
	$instArr["updated_at"]=date("Y-m-d H:i:s",time());
	$instArr["status"]=$request->status;
	$add=$Users->updatevehicletype($instArr,$request->vehicletype_id);
	$resp["status"]=0;
	$resp["msg"]="Vehicle type Updated";
	return redirect('vehicletype');
	}
			
 	}
	
 
}
