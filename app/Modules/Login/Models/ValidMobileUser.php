<?php 
/*
* File Name: ValidMobileUser.php
* Description: ValidMobileUser.php file has log data of SMS
* Created Date: 16 Nov 2017 
* Created By: Naresh Shankar S <shankar@gaadizo.com>
* Modified Date & Reason:
*/
namespace App\Modules\Login\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
class ValidMobileUser extends Model
{
	protected $table = 'valid_mobile_user';			// assigning table name of the model
	public $timestamps = false;						// asssigning default timestamp to false
	
	/*
	* GetOtpData() is used to check sms count validation
	* @param mobile no   //search criteria
	* @return id of the table
	*/
	public function GetOtpData($mobNo){
		try {
			$data=$this->select(array("id","mobile_no","otp","name"))
			->where("mobile_no",$mobNo)->get();
			if(isset($data[0]))
				return $data[0]->id;
			else
				return 0;
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* otpVerified() is used to update the OTP has been verified
	* @param update array and otp arr
	* @return boolean or String Or error
	*/
	public function otpVerified($updArr,$otpData){
		try {
			return $this->where('mobile_no', $otpData['mobNo'])
			->where('otp', $otpData['otp'])
			->where('status', 0)
			->update($updArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* updateOtp() is used to update the OTP
	* @param update array and id
	* @return boolean or String Or error
	*/
	public function updateOtp($updArr,$id){
		try {
			return $this->where('id', $id)->update($updArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* addOtp() is used to add th booking
	* @param insrt array 
	* @return boolean or String Or error
	*/
	public function addOtp($insArr){
		try {
			return $this->insertGetId($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
}