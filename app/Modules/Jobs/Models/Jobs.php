<?php 
/*
* File Name: Jobs.php
* Description: Jobs.php file has user model is used to handle Jobs table data
*/
namespace App\Modules\Jobs\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Jobs extends Model
{
	//use Sortable;
	 protected $table = 'booking';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false

	 
	/*
	* DetailJobs() is used to get user etails foe my account
	* @param booking_id   //search criteria
	* @return array of area table values
	*/
	public function hostelDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","hostel_name","address","city","state","pincode","description","photos","created_at","hostel_type","status","latitude","longitude","user_id"))->first();
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
	 
	public function Checkbooking($booking_id){
		try {
			$query=$this->select(array("*"));
			if($booking_id!="")
				$query->where("id",$booking_id);
			 
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
 
	public function jobs_list(){
		
		try {
			$query=$this->select(array("id","customer_id","pickup_location","drop_location","pickup_date","booking_no"));
 			
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	public function saveFile($insArr){
		try {
		DB::table('file_upload')->insert($insArr);
 			return DB::getPdo()->lastInsertId();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function customer_list($id){
		
		try {
			$data=DB::table("customers")->where("id",'=',$id)->select("id","name");
			return $data->get()->toArray();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function state_list(){
		
		try {
			$data=DB::table("state")->select("id","name");
			 
 			
			return $data->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function city_list(){
		
		try {
			$data=DB::table("city")->select("id","name","state_id");
			 
 			
			return $data->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}	 
	
	public function accept_booking($insArr,$id){
		try {
			$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
}
