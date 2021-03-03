<?php 
/*
* File Name: Users.php
* Description: Users.php file has user model is used to handle users table data
*/
namespace App\Modules\Login\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Users extends Model
{
	 protected $table = 'users';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false
	
	/*
	* vehicleDetails() is used to get vehicel details for my account
	* @param user_id   //search criteria
	* @return array of area table values
	*/
	public function vehicleDetails($id){
		try {
			$query=$this->join('vehicle_details', 'vehicle_details.created_by', '=', 'users.id')
			->join('manufacturer', 'manufacturer.id', '=', 'vehicle_details.manufacturer_id')
			->join('model', 'model.id', '=', 'vehicle_details.model_id')
			->leftJoin('services_booking', function($join) {
				$join->on('services_booking.vehicle_id', '=', 'vehicle_details.id');
			})
			->where("vehicle_details.del_status",0)
			->where("users.id",$id)
			->select(DB::raw("manufacturer.manufacturer_name,model.model_name,services_booking.service_booking_number,vehicle_details.vehicle_number,MAX(services_booking.requested_date) AS lastservice,services_booking.status as book_status,vehicle_details.id as vehicle_id,vehicle_details.model_id"))
			->groupBy("vehicle_details.id")
			->orderBy("vehicle_details.created_by","desc");
			$resp=$query->get();
			if($resp)
				return $resp->toArray();
			else
				return array();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* userDetails() is used to get user etails foe my account
	* @param user_id   //search criteria
	* @return array of area table values
	*/
	public function userDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","name","mobile_number","email_id","user_type"))->first();
			if($query)
				return $query->toArray();
			else
				return array();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function user_list($id){
		try {
			$query=$this->where("email",'=',$id)->select(array("*"))->first();
			if($query)
				return $query->toArray();
			else
				return array();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* ValidateUser() is used to check mobile number already reg or not
	* @param mobile no, id of user in edit(optional)   //search criteria
	* @return array of area table values
	*/
	public function ValidateUser($mob_number){
		try {
			$query=$this->where("mobile_number",'=',$mob_number)->select(array("id","user_type","registered","name","mobile_number","email_id","vouchar_id"));
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* getUserBySocialId() is used to get user by social id
	* @param mobile no, id of user in edit(optional)   //search criteria
	* @return array of area table values
	*/
	public function getUserBySocialId($socialId,$socialUserId){
		try {
			$query=$this->select(array("id","name","mobile_number","email_id","user_type"));
			if($socialId==1)//fb
				$query->where("fb_user_id",$socialUserId);
			if($socialId==2)//google
				$query->where("g_user_id",$socialUserId);
			return $query->first();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function getUserByEmailId($mailId){
		
		try {
			$query=$this->select(array("id","name","phone_no","email","password"));
			
			$query->where("email",$mailId);
 			
			return $query->first();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* addUser() is used to add the user
	* @param insrt array 
	* @return boolean or String Or error
	*/
	public function addUser($insArr){
		try {
			$users=$this->where("mobile_number",'=',$insArr["mobile_number"])->select(array("id","user_type"))->get();
			if(count($users)==0){
				$insArr["created_datetime"]=date("Y-m-d H:i:s",time());
				return $this->insertGetId($insArr);
			}else{
				$this->where('id', $users[0]->id)->update($insArr);
				return $users[0]->id;
			}
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function updateUser($insArr,$id){
		try {
				$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function updateByMobileNo($insArr,$mobNo){
		try {
				$this->where('mobile_number',$mobNo)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	
}
