<?php 
/*
* File Name: Customer.php
* Description: Customer.php file has Customer model is used to handle Customer table data
*/
namespace App\Modules\Dashboard\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
	 protected $table = 'users';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false
	 

	public function dashboardData(){
		try {
			$data=[];
			$data["hostel"]=$this->where("user_type",'=',2)->count();
			$data["customer"]=$this->where("user_type",'=',3)->count();
			return $data;

		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	
}
