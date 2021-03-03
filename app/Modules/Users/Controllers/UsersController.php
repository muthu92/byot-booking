<?php 
/*
* File Name: UsersController.php
* Description: UsersController is used to deal with login/register
 
*/
namespace App\Modules\Users\Controllers;
use App\Http\Controllers\Controller;				// controller lib
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
use \Crypt;
use DB;

class UsersController extends Controller
{
	/*
	* index() is used to show the Users page
	* @param request data
	* @return to the view
	*/
	public function index(Request $request){
		try{ 
			$Users=new Users();
			$user_list=$Users::paginate(10);
			 
			/*$search = $request->search; dd($search);
			$users = Users::where('name', 'like', '%'.$search.'%')->paginate(10);*/



			return view('Users::users', [
            'user_list' => $user_list
			
            /*'users' => $users,*/
        ]);
		}catch(\Exception $e){
			Log::error('error page: '.$e->getMessage()); 		// making log in file
			return view('error.home');									// showing the err page
			return false;
		}
	}

	public function loadUsers(Request $request)
    {
        $input = $request->all();
        return Users::loadUsers($input);
    }


	public function getCityList(Request $request)
        {
			
            $cities = DB::table("city")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
            return response()->json($cities);
		}
		
		public function profile(Request $request){
		
			$Users=new Users();
			$state_list=$Users->state_list();
			$city_list=$Users->city_list();
			$user_edit=Auth::user();
			 return view('Users::profile', [
				'state_list' => $state_list,
				'user_edit' => $user_edit,
				'city_list' => $city_list
			]);
		}
	public function users_add(Request $request){
		
		$Users=new Users();
		$state_list=$Users->state_list();
		$city_list=$Users->city_list();
		$vehicle_list=$Users->vehicle_list();
 		return view('Users::users_add', [
            'state_list' => $state_list,
            'city_list' => $city_list,
            'vehicle_list' => $vehicle_list
        ]);
	}
	public function deleteUser(Request $request){ 
	$user=new Users();
	$category=$user->deleteUser($request->id);
	return redirect('users');    
	}

	public function users_edit(Request $request){
		$Users=new Users();
		$state_list=$Users->state_list();
		$city_list=$Users->city_list();
		$vehicle_list=$Users->vehicle_list();
		$user_edit=$Users->userDetails($request->user_id);
		
		//$user_edit["password"]=Crypt::decrypt($user_edit["password"]);
		//print_r($user_edit);
 		 return view('Users::users_edit', [
            'user_edit' => $user_edit,
			'state_list' => $state_list,
            'city_list' => $city_list,			
			 'vehicle_list' => $vehicle_list
        ]);
	}
	public function view(Request $request){
		$Users=new Users();
		$state_list=$Users->state_list();
		$city_list=$Users->city_list();
		$user_edit=$Users->userDetails($request->user_id);
		//$user_edit["password"]=Crypt::decrypt($user_edit["password"]);
		//print_r($user_edit);
 		 return view('Users::view', [
            'user_edit' => $user_edit,
			'state_list' => $state_list,
            'city_list' => $city_list
        ]);
	}
	
	public function users_create(Request $request){
		
		$rules=[
		'name' => 'required',
		'email' => 'required|email',
		'phone_no' => 'required|digits_between:10,10|numeric',
		'password' => 'required',
		];
		$messages = [
			'phone_no.digits_between' => 'Please Enter 10 Digit Phone Number',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Users::users_add');
		}  */		
			$Users=new Users();
			$userData=$Users->ValidateUser($request->email); 			
			if(count($userData)>1){ // user exist more than 1
				$error="Invalid User";
			}else if(count($userData)==0){
					$instArr=array();
					$instArr["name"]=$request->name;
					$instArr["email"]=$request->email;
					$instArr["password"]=bcrypt($request->password);
					$instArr["phone_no"]=$request->phone_no;
					$instArr["user_type"]=$request->user_type;
 					$instArr["country"]=$request->country;
					$instArr["state"]=$request->state;
					$instArr["city"]=$request->city;

					$instArr["status"]=$request->status;
					if($request->user_type==2)
						$instArr["vehicle_id"]=$request->vehicle_id;
					 
					$instArr["created_at"]=date("Y-m-d H:i:s",time());
					$instArr["updated_at"]=date("Y-m-d H:i:s",time());
					$add=$Users->addUser($instArr);
					$resp["status"]=0;
					$resp["msg"]="User Created";
					return redirect('users');
			}
			
		// return view('Users::users_add');
	}
	public function profile_update(Request $request){
		print_r($request->all());
		$rules=[
		'name' => 'required',
		'email' => 'required|email',
		'phone_no' => 'required|digits_between:10,10|numeric',
		];
		$messages = [
			'phone_no.digits_between' => 'Please Enter 10 Digit Phone Number',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Users::users_add');
		}  */		
			$Users=new Users();
			$userData=$Users->ValidateUser($request->email,$request->user_id); 			
			if(count($userData)>1){ // user exist more than 1
				$error="Invalid User";
			}else if(count($userData)==0){
					$instArr=array();
					$instArr["name"]=$request->name;
					$instArr["email"]=$request->email;
					//$instArr["password"]=bcrypt($request->password);
					$instArr["phone_no"]=$request->phone_no;
					$instArr["country"]=$request->country;
					$instArr["state"]=$request->state;
					$instArr["city"]=$request->city;
					//$instArr["created_at"]=date("Y-m-d H:i:s",time());
					$instArr["updated_at"]=date("Y-m-d H:i:s",time());
					$add=$Users->UpdateUser($instArr,$request->user_id);
					$resp["status"]=0;
					$resp["msg"]="User Updated";
					return redirect('users/profile');
			}
			
		// return view('Users::users_add');
	}
	
	public function users_update(Request $request){
		print_r($request->all());
		$rules=[
		'name' => 'required',
		'email' => 'required|email',
		'phone_no' => 'required|digits_between:10,10|numeric',
		];
		$messages = [
			'phone_no.digits_between' => 'Please Enter 10 Digit Phone Number',
		];
		$validator = Validator::make($request->all(),$rules,$messages);
		$resp=array();
		
         /* if ($validator->fails()) {
			$resp["status"]=0;
			$resp["msg"]="Invalid Data";
         //   return response()->json($resp);// response as json
        return view('Users::users_add');
		}  */		
			$Users=new Users();
			$userData=$Users->ValidateUser($request->email,$request->user_id); 			
			if(count($userData)>1){ // user exist more than 1
				$error="Invalid User";
			}else if(count($userData)==0){
					$instArr=array();
					$instArr["name"]=$request->name;
					$instArr["email"]=$request->email;
					//$instArr["password"]=bcrypt($request->password);
					$instArr["phone_no"]=$request->phone_no;
					$instArr["user_type"]=$request->user_type;
					$instArr["country"]=$request->country;
					$instArr["state"]=$request->state;
					$instArr["city"]=$request->city;
				    $instArr["status"]=$request->status;
					if($request->user_type==2)
						$instArr["vehicle_id"]=$request->vehicle_id;
					 
					//$instArr["created_at"]=date("Y-m-d H:i:s",time());
					$instArr["updated_at"]=date("Y-m-d H:i:s",time());
					$add=$Users->UpdateUser($instArr,$request->user_id);
					$resp["status"]=0;
					$resp["msg"]="User Updated";
					return redirect('users');
			}
			
		// return view('Users::users_add');
	}
	
 
}
