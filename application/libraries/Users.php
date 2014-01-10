<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users 
{

	public $CI = NULL;


	public function __construct()
	{	
		$this->CI =& get_instance();
		$this->CI->load->helper('security');
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

	public function generate_session($form_data)
	{
		$email = $form_data['users_email_address'];
		$password = $form_data['users_password'];
		$query = $this->CI->db->query("SELECT users_id, users_firstname, users_photo 
									   FROM users 
									   WHERE users_email_address = '". $email ."' and 
									   		 users_password = '". $password ."' and 
									   		 users_activated = 1 ");

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

	public function user_info_update($dataArray, $users_id)
	{
		$this->CI->session->set_userdata('users_firstname', $dataArray['users_firstname']);// Re-assign a value to users_firstname, in case it will be updated(because users_firstname will display in right up corner)
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
	}

	public function user_avatar_update($users_id)
	{
		$users_photo = 'wpilife_'.$users_id.'.jpg';
		$dataArray = array('users_photo'=>$users_photo);
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
	}

	public function user_password_update($newPassword, $users_id)
	{
		$newPassword = $this->CI->security->xss_clean($newPassword);
		$newPassword = do_hash($newPassword, 'md5'); // MD5
		$dataArray = array('users_password'=>$newPassword);
		$users_id = $this->CI->security->xss_clean($users_id);
		$this->CI->db->where('users_id', $users_id);
		$this->CI->db->update('users', $dataArray);
	}

	public function oldPassword_check($oldPassword, $users_id)
	{
		$users_id = $this->CI->security->xss_clean($users_id);
		$oldPassword = $this->CI->security->xss_clean($oldPassword);
		$oldPassword = do_hash($oldPassword, 'md5'); // MD5
		$query = $this->CI->db->query("SELECT users_id
									   FROM users 
									   WHERE users_id = ". $users_id. "
									   		 AND users_password ='".$oldPassword."' ");
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
	}
}

?>
