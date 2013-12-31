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

	public function get_products_list_by_count($count = 3)
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
	
	public function get_list_count()
	{
		$this->CI->db->where('isAvailable',1);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('house');
		$result = $query->row_array();
		return $result['count'];
	}
}
?>
