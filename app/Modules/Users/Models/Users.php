<?php 
/*
* File Name: Users.php
* Description: Users.php file has user model is used to handle users table data
*/
namespace App\Modules\Users\Models;					//name space declaration
use Illuminate\Database\Eloquent\Model;				//Eloquent Model
use Illuminate\Support\Facades\DB;

class Users extends Model
{

	 protected $table = 'users';					// assigning table name of the model
	 public $timestamps = false;					// asssigning default timestamp to false
	 
	/*
	* userDetails() is used to get user etails foe my account
	* @param user_id   //search criteria
	* @return array of area table values
	*/
	public function userDetails($id){
		try {
			$query=$this->where("id",'=',$id)->select(array("id","name","phone_no","email","password","user_type","country","city","state","status","vehicle_id"))->first();
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
	public function ValidateUser($email,$id=''){
		try {
			$query=$this->select(array("id"));
			if($email!="")
				$query->where("email",$email);
			if($id!="")
				$query->where("id",'!=',$id);
			
			
			 
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
	
	public function user_list(){
		
		try {
			$query=$this->select(array("id","name","phone_no","email","password","created_at","user_type","country","city","state","status"));
 			
			return $query->get();
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
	
	public function vehicle_list(){
		
		try {
			$data=DB::table("vehicle")->select("id","vehicle_name");
 			
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
	/*
	* addUser() is used to add the user
	* @param insrt array 
	* @return boolean or String Or error
	*/
	public function addUser($insArr){
		try {
			$users=$this->where("email",'=',$insArr["email"])->select(array("id","user_type"))->get();
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
	public function updateUser($insArr,$id){
		try {
				$this->where('id',$id)->update($insArr);
		}catch (QueryException $e) {
			return $e; 
		}
	}
	public function deleteUser($id){
		try {
			DB::table("users")->delete($id);
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

	/* data table----------------------*/
	public static function loadUsers11($input)
    {
        $searchSQL = '';
        $searchValue = $input['search']['value'];
        $OrderColumnNumber = $input['order'][0]['column'];
        $OrderColumnDir = $input['order'][0]['dir'];
        $start = $input['start'];
        $length = $input['length'];
        $draw = $input['draw'];
        if ( $OrderColumnNumber == 1 )
        {
            $OrderColumnName = 'users.name';
        }
        else
        {
            $OrderColumnName = 'users.id';
        }
        
        $searchSQL .= " WHERE users.listing_status not in('Published','Cancelled','Rejected') AND users.paid_amount > 0 ";
        
        if( in_array(Auth::user()->role_id,array(4,5) )  )
        {
            $searchSQL .= " AND users.createdby=".Auth::user()->id;
        }
        
        if ( !empty($searchValue) )
        {
            $searchSQL = " AND (packages.name LIKE '%{$searchValue}%' )";
        }
        
        /*if( !empty($searchSQL) )
        {
            $searchSQL = " WHERE ".ltrim($searchSQL, ' AND'); 
        }*/

        $list = DB::select("SELECT users.id,users.name,users.phone_no,users.email,users.user_type,users.status,country.name as country_name,state.name,city.nameusers.balance_amount,users.payment_method,users.payment_status,users.listing_status,"
                . "users.createdby,users.created_at,users.name AS created_user,users.assigned_to,users.assigned_on,users.is_block,( select users.name from users WHERE users.id=users.assigned_to ) as assignedUser FROM users LEFT JOIN packages ON users.package=packages.id LEFT JOIN users ON users.createdby=users.id {$searchSQL} ORDER BY {$OrderColumnName} {$OrderColumnDir} LIMIT {$start},{$length}");
                
        $recordsTotal = DB::select("SELECT users.id FROM users LEFT JOIN packages ON users.package=packages.id LEFT JOIN users ON users.createdby=users.id");
        
        $recordsFiltered = DB::select("SELECT users.id FROM users LEFT JOIN packages ON users.package=packages.id LEFT JOIN users ON users.createdby=users.id {$searchSQL}");

        $result = array(
            'draw' => $draw,
            'recordsTotal' => count($recordsTotal),
            'recordsFiltered' => count($recordsFiltered),
            'data' => $list
        );
        return $result;
    }

    /* Load Users */
    public static function loadUsers($input)
    {

        $searchSQL = '';
        $searchValue = $input['search']['value'];
        $OrderColumnNumber = $input['order'][0]['column'];
        $OrderColumnDir = $input['order'][0]['dir'];
        $start = $input['start'];
        $length = $input['length'];
        $draw = $input['draw'];
        if ( $OrderColumnNumber == 1 )
        {
            $OrderColumnName = 'users.name';
        }
        else
        {
            $OrderColumnName = 'users.id';
        }

        if ( !empty($searchValue) )
        {
            $searchSQL = " AND (users.name LIKE '%{$searchValue}%' )";
        }
        
        if( !empty($searchSQL) )
        {
            $searchSQL = " WHERE ".ltrim($searchSQL, ' AND'); 
        }


        $list = DB::select("SELECT users.id,users.name,users.phone_no,users.email,users.user_type,users.status,users.created_at,country.name as country_name,state.name as state_name,city.name as city_name FROM users 
            LEFT JOIN country ON country.id = users.country
            LEFT JOIN state ON state.id = users.state
            LEFT JOIN city ON city.id = users.city {$searchSQL} ORDER BY {$OrderColumnName} {$OrderColumnDir} LIMIT {$start},{$length}");
                
        $recordsTotal = DB::select("SELECT users.id,users.name,users.phone_no,users.email,users.user_type,users.status,users.created_at,country.name as country_name,state.name as state_name,city.name as city_name FROM users 
            LEFT JOIN country ON country.id = users.country
            LEFT JOIN state ON state.id = users.state
            LEFT JOIN city ON city.id = users.city {$searchSQL} ORDER BY {$OrderColumnName} {$OrderColumnDir} LIMIT {$start},{$length}");
        
        $recordsFiltered = DB::select("SELECT users.id,users.name,users.phone_no,users.email,users.user_type,users.status,users.created_at,country.name as country_name,state.name as state_name,city.name as city_name FROM users 
            LEFT JOIN country ON country.id = users.country
            LEFT JOIN state ON state.id = users.state
            LEFT JOIN city ON city.id = users.city {$searchSQL} ORDER BY {$OrderColumnName} {$OrderColumnDir} LIMIT {$start},{$length}");

        $result = array(
            'draw' => $draw,
            'recordsTotal' => count($recordsTotal),
            'recordsFiltered' => count($recordsFiltered),
            'data' => $list
        );
        return $result;
    }
	
	
}
