<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users 
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function isEmailExist($email)
	{
		$email = trim($email);
		$email = $this->CI->security->xss_clean($email);
		$this->CI->db->where('users_email_address', $email);
		$query = $this->CI->db->get('users');
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function passwordUpdatebyEmail($email, $password)
	{
		$dataArray['users_password'] = $password;
		$email = trim($email);
		$this->CI->db->where('users_email_address', $email);
		$this->CI->db->update('users', $dataArray);
	}

	public function isEmailDuplicated($email)
	{
		$email = trim($email);
		$email = $this->CI->security->xss_clean($email);
		$this->CI->db->where('users_email_address', $email);
		$query = $this->CI->db->get('users');
		if ($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function addNewUser($userDataArray)
	{
		$this->CI->db->insert('users',$userDataArray);
	}

	public function updateRecentLoginTime($user_id)
	{
		$dataArray = array('recent_login' => date("Y-m-d H:i:s") );
		$this->CI->db->where('users_id', $user_id);
		$this->CI->db->update('users', $dataArray);
	}


	public function login($email, $password)
	{
		$this->CI->db->where('users_email_address', $email);
		$this->CI->db->where('users_password', $password);
		$this->CI->db->where('users_activated',1);
		$this->CI->db->select('users_id, users_firstname, users_photo');
		$query = $this->CI->db->get('users');

		if ($query->num_rows() > 0)
		{
			$row = $query->row_array(); 

			$this->CI->session->set_userdata('users_email', $email);
			$this->CI->session->set_userdata('users_id', $row['users_id']);
			$this->CI->session->set_userdata('users_firstname', $row['users_firstname']);
			$this->CI->session->set_userdata('users_avatar', $row['users_photo']);
			
			//generate session for CSSA officer_title_update
			$cssa_query = $this->CI->db->query("SELECT id 
											    FROM cssa_manager_list 
											    WHERE user_id = ". $row['users_id'] );
			if ($cssa_query->num_rows() > 0)
			{
				$cssa_row = $cssa_query->row_array(); 
				$this->CI->session->set_userdata('cssa_id', $cssa_row['id']);
			}
			$this->updateRecentLoginTime($row['users_id']);
			return true;	
		}
		else
		{
			return false;
		}	
	}

	public function get_user_info($users_id)
	{
		$users_id = $this->CI->security->xss_clean($users_id);
		$query = $this->CI->db->query("SELECT *
									   FROM users 
									   WHERE users_id = ". $users_id);
		if ($query->num_rows() > 0)
		{
			return $query->row_array(); 
		}		
		else
		{
			return false;
		}					   
		
	}

	// update data filed which will be used to generate password reset link
	public function userPasswdInfoUpdate($dataArray, $email){
		$email = trim($email);
		$this->CI->db->where('users_email_address', $email);
		$this->CI->db->update('users', $dataArray);
		return $this->CI->db->affected_rows();
	}

	public function hashStrCheckAndReturnEmail($hashStr){
		$hashStr = trim($hashStr);
		if(strlen($hashStr) != 32 ){
			return array(false, 1);
		} else {
			$this->CI->db->where('extra_field', $hashStr);
			$query = $this->CI->db->get('users');
			if ($query->num_rows() > 0)	{
				$row = $query->row_array();

				$user_id = $row['users_id'];
				$email = $row['users_email_address'];
				$randStr = $row['random_string'];

				$today = date('Ymd');

				$extraAuth = $email.do_hash($today, 'md5').$randStr;

				if(do_hash($extraAuth, 'md5') == $hashStr)	return array($email, $user_id);
													else	return array(false, 2);
			} else {
				return array(false, 1);
			}
		}
	}

	public function user_info_update($dataArray, $users_id)
	{
		$this->CI->session->set_userdata('users_firstname', $dataArray['users_firstname']);// Re-assign a value to users_firstname, in case it will be updated(because users_firstname will display in right up corner)
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
		return $this->CI->db->affected_rows();
	}

	public function user_avatar_update($users_id)
	{
		$users_photo = 'wpilife_'.$users_id.'.jpg';
		$dataArray = array('users_photo'=>$users_photo);
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
		return $this->CI->db->affected_rows();
	}

	public function user_password_update($newPassword, $users_id)
	{
		$dataArray = array('users_password'=>$newPassword);
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
		return $this->CI->db->affected_rows();
	}

	public function userPasswordUpdate($passwordArray, $user_id, $email){
		
		$user_id = $this->CI->security->xss_clean($user_id);
		$this->CI->db->where('users_id', $user_id);
		$this->CI->db->where('users_email_address', $email);
		$this->CI->db->update('users', $passwordArray);
		return $this->CI->db->affected_rows();
	}

	public function oldPassword_check($oldPassword, $users_id)
	{
		$users_id = $this->CI->security->xss_clean($users_id);

		$this->CI->db->where('users_id',$users_id);
		$this->CI->db->where('users_password',$oldPassword);
		$query = $this->CI->db->get('users');

		if ($query->num_rows() > 0)
		{
			return true; 
		}		
		else
		{
			return false;
		}
	}

	public function cssa_officer_list()
	{
		$this->CI->db->select('cssa_manager_list.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('cssa_manager_list');
		$this->CI->db->join('users', 'cssa_manager_list.user_id = users.users_id');
		$query = $this->CI->db->get();
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result(); 
			return $result; 
		}		
		else
		{
			return false;
		}		
	}

	public function user_list()
	{
		$query = $this->CI->db->query("SELECT users_id, users_firstname, users_lastname
									   FROM users 
									   WHERE users_id not in (SELECT user_id 
									   						  FROM cssa_manager_list)");
		
		if ($query->num_rows() > 0)
		{
			$result = $query->result(); 
			return $result; 
		}		
		else
		{
			return false;
		}		
	}

	public function officer_title_update($id, $dataArray)
	{
		$this->CI->db->where('id', $id);
		$this->CI->db->update('cssa_manager_list', $dataArray);
		return $this->CI->db->affected_rows();
	}

	/**
	 * Do not open the code below, it will bring disaster
	 */
	
	/*
	public function updateUserNameandPassword()
	{
		$query = $this->CI->db->get('users');

		if ($query->num_rows() > 0)
		{
			$dataArray = array();
			$result = $query->result(); 
			foreach($result as $row)
			{
				
				echo $row->users_id."<br/>";

				$salt = $this->CI->config->item('encryption_key');
				$password = $row->users_password;
				$passwordMD5 = do_hash($salt.$password, 'md5'); // MD5
				
				$dataArray['users_password'] = $passwordMD5;

				if($row->users_firstname == "member")
				{
					$name = explode("@", $row->users_email_address);
					$dataArray['users_firstname'] = $name[0];
				}
				else
				{
					$dataArray['users_firstname'] = $row->users_firstname;
				}
				$this->justUpdate($row->users_id, $dataArray);
				unset($dataArray);
				//break;
			}
			
		}
	}

	public function justUpdate($id, $dataArray)
	{
		$this->CI->db->where('users_id', $id);
		$this->CI->db->update('users', $dataArray);
	}
	*/
}

?>
