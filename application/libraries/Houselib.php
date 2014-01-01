<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Houselib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_all_house_available()
	{
		$this->CI->db->where('isAvailable',1);
		$this->CI->db->select('house.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('house');
		$this->CI->db->join('users', 'house.user_id = users.users_id');
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

	public function get_house_by_houseID($id)
	{
		$this->CI->db->where('house.house_id', $id);
		$this->CI->db->select('house.*, users.users_firstname, users.users_lastname, users_telephone, users_qq, users_email_address');
		$this->CI->db->from('house');
		$this->CI->db->join('users', 'house.user_id = users.users_id');

		$query = $this->CI->db->get();

		if ($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result; 
		}		
		else
		{
			return false;
		}
	}

	public function get_house_by_userID($id)
	{
		$this->CI->db->where('user_id', $id);
		$query = $this->CI->db->get('house');
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

	public function get_recent_list_by_count($count = 3)
	{
		$this->CI->db->where('isAvailable',1);
		$this->CI->db->select('house.*');
		$this->CI->db->order_by("house_id", "desc"); 
		$this->CI->db->limit($count);
		$query = $this->CI->db->get('house');
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

	public function get_house_list($from=0, $size=20)
	{
		$this->CI->db->where('isAvailable',1);
		$this->CI->db->select('house.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('house');
		$this->CI->db->join('users', 'house.user_id = users.users_id');
		$this->CI->db->limit($size, $from);
		
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

	public function get_list_count()
	{
		$this->CI->db->where('isAvailable',1);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('house');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_house_by_two_ID($house_id, $users_id)
	{
		$this->CI->db->where('house_id', $house_id);
		$this->CI->db->where('user_id', $users_id);
		$query = $this->CI->db->get('house');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result; 
		}		
		else
		{
			return false;
		}	
	}

	public function house_update($house_id, $user_id, $dataArray)
	{
		$this->CI->db->where('house_id', $house_id);
		$this->CI->db->where('user_id', $user_id);
		$this->CI->db->update('house', $dataArray);
	}

	public function house_add($dataArray)
	{
		$this->CI->db->insert('house',$dataArray);
	}
}
?>
