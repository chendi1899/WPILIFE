<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shoplib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_products_list_by_keyword($keyword, $type = 'SELL')
	{
		$this->CI->db->where('blogs_type', $type);
		$this->CI->db->where('blogs_available',1);
		$this->CI->db->like('blogs_title', $keyword);
		$this->CI->db->select('blogs.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('blogs');
		$this->CI->db->join('users', 'blogs.blogs_author = users.users_id');
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

	public function get_products_list_by_count($count = 3, $type = 'SELL')
	{
		$this->CI->db->where('blogs_type', $type);
		$this->CI->db->where('blogs_available',1);
		$this->CI->db->select('blogs_id, blogs_title, blogs_price, blogs_image_cover');
		$this->CI->db->order_by("blogs_id", "desc"); 
		$this->CI->db->limit($count);
		$query = $this->CI->db->get('blogs');
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
	
}
?>
