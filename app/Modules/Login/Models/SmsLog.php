<?php 
/*
* File Name: SmsLog.php
* Description: SmsLog.php file has log data of SMS
* Created Date: 15 Nov 2017 
* Created By: Naresh Shankar S <shankar@gaadizo.com>
* Modified Date & Reason:
*/

namespace App\Modules\Login\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;
class SmsLog extends Model
{
	protected $table = 'sms_log';					// assigning table name of the model
	public $timestamps = false;					// asssigning default timestamp to false
	
	/*
	* getSmsLog() is used to check sms count validation
	* @param mobile no, id of user in edit(optional)   //search criteria
	* @return array of area table values
	*/
	public function getSmsLog($mobNo){
		try {
			return $this->selectRaw('COUNT(IF(`mobile_number`=? AND created_datetime>?,1,NULL)) AS hour_base,COUNT(IF(`mobile_number`=? AND created_datetime>?,1,NULL)) AS day_base', array($mobNo,date("Y-m-d H:i:s", time()-3600),$mobNo,date("Y-m-d ", time())."00:00:00"))
			->where('mobile_number',$mobNo)
			->first();
		}catch (QueryException $e) {
			return $e; 
		}
	}
	/*
	* addSmsLog() is used to add th booking
	* @param insrt array 
	* @return boolean or String Or error
	*/
	public function addSmsLog($insArr){
		try {
			return $this->insertGetId($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	
	
	
	
}