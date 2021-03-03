<?php 
/*
* File Name: Vehicletype.php
* Description: Vehicletype.php file has user model is used to handle Vehicletype table data
*/
namespace App\Modules\Vehicletype\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Vehicletype extends Model
{
	 protected $table = 'vehicle_type';					// assigning table name of the model
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
	public function vehicletypeDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","name","status"))->first();
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
	public function Validatevehicletype($name,$id=''){
		try {
			
			 
			$query=$this->select(array("id"));
			if($name!="")
				$query->where("name",$name);
			if($id!="")
				$query->where("id",'!=',$id);
			
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	 
	
	 
	/*
	* addUser() is used to add the user
	* @param insrt array 
	* @return boolean or String Or error
	*/
	public function saveFile($insArr){
		try {
		DB::table('file_upload')->insert($insArr);
 			return DB::getPdo()->lastInsertId();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function addvehicletype($insArr){
		try {
			$category=$this->where("name",'=',$insArr["name"])->select(array("id"))->get();
			if(count($category)==0){
 				return $this->insertGetId($insArr);
			}else{
				$this->where('id', $category[0]->id)->update($insArr);
				return $category[0]->id;
			}
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function updatevehicletype($insArr,$id){
		try {
				$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	 
	
	
}
