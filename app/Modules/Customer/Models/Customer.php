<?php 
/*
* File Name: Customer.php
* Description: Customer.php file has Customer model is used to handle Customer table data
*/
namespace App\Modules\Customer\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
	 protected $table = 'customers';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false
	 
	/*
	*CustomerDetails() is used to get user etails foe my account
	* @param customer_id   //search criteria
	* @return array of area table values
	*/
	public function customerDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","name","phone_no","email","password","user_type"))->first();
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
	public function ValidateCustomer($email,$mobile_no=''){
		try {
			$query=$this->select(array("id"));
			if($email!="")
				$query->where("email_id",$email);
			if($mobile_no!="")
				$query->where("mobile_no",$mobile_no);
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
 
	public function customer_list(){
		
		try {
			$query=$this->select(array("id","name","mobile_no","email_id","location","created_at"));
 			
			return $query->get();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
		public function booking_list(){
		
		try {
 			$query=DB::table("booking")->select("id");
 			return $query->get()->toArray();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	 
	
	public function addCustomer($insArr){
		try {
			$customer=$this->where("email_id",'=',$insArr["email_id"])->select(array("id"))->get();
			if(count($customer)==0){
 				return $this->insertGetId($insArr);
			}else{
				$this->where('id', $customer[0]->id)->update($insArr);
				return $customer[0]->id;
			}
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function addBooking($insArr){
		 
		try {
  			 DB::table('booking')->insert($insArr);
			 return DB::getPdo()->lastInsertId();
 		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	
	
	public function updateCustomer($insArr,$id){
		try {
				$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function deleteCustomer($id){
		try {
			DB::table("customer")->delete($id);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	 
	
	
}
