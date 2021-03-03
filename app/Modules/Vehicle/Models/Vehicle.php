<?php 
/*
* File Name: Vehicle.php
* Description: Vehicle.php file has user model is used to handle Vehicle table data
*/
namespace App\Modules\vehicle\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;
 
class vehicle extends Model
{
	 protected $table = 'vehicle';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false
	
	/*
	* vehicleDetails() is used to get vehicel details for my account
	* @param user_id   //search criteria
	* @return array of area table values
	*/
	 
	/*
	* userDetails() is used to get user etails foe my account
	* @param user_id   //search criteria
	* @return array of area table values
	*/
	public function VehicleDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","vehicle_name","vehicle_no","vehicle_model","vehicle_type"))->first();
			 
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
	public function Validatevehicle($vehicle_no,$id=""){
		try {
			
			 
			$query=$this->select(array("id"));
			if($vehicle_no!="")
				$query->where("vehicle_no",$vehicle_no);
			if($id!="")
				$query->where("id",'!=',$id);
			
			return $query->get();
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
	
	public function vehicle_list(){
		
		try {
			$query=$this->select(array("id","category_id","sub_category_name","created_at"));
 			
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function vehicletype_list()
{
    return DB::select(
        DB::raw('SELECT * FROM `vehicle_type` where status=1')
    );
}
	 
	/*
	* addUser() is used to add the user
	* @param insrt array 
	* @return boolean or String Or error
	*/
	 
	public function addvehicle($insArr){
		try {
			$users=$this->where("vehicle_no",'=',$insArr["vehicle_no"])->select(array("id"))->get();
			if(count($users)==0){
 				return $this->insertGetId($insArr);
			}else{
				$this->where('id', $users[0]->id)->update($insArr);
				return $users[0]->id;
			}
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function updatevehicle($insArr,$id){
		try {
				$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	public function deletevehicle($id){
		try {
			DB::table("vehicle")->delete($id);
		}catch (QueryException $e) {
			return $e; 
		}
	}	
	
}
