<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shoplib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_shop_list($type = "SELL", $enablePagination= false, $from=0, $size=20)
	{
		$this->CI->db->where('shop_type', $type);
		$this->CI->db->where('shop_available',1);
		$this->CI->db->select('shop.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('shop');
		$this->CI->db->join('users', 'shop.user_id = users.users_id');
		$this->CI->db->order_by("shop_id", "desc"); 
		//$this->CI->db->select('shop_id, shop_title, shop_image_cover, shop_price');
		if($enablePagination == true)
		{
			$this->CI->db->limit($size, $from);
		}
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

	public function get_shop_list_with_content($type = "SELL", $from=0, $size=20)
	{
		$query = $this->CI->db->query("SELECT shop.*, users_firstname, users_lastname
									   FROM shop left join users on (shop.user_id = users.users_id) 
									   WHERE shop.shop_type = '".$type."' and shop.shop_available = 1 
									   limit ".$from.",".$size);
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

	public function get_shop_list_by_count($count=2, $type = 'SELL')
	{
		$query = $this->CI->db->query("SELECT shop_id, shop_title, shop_image_cover, shop_price 
									   FROM shop 
									   WHERE shop_type = '".$type."' and shop.shop_available = 1 
									   ORDER BY shop_id DESC 
									   limit 0 ,".$count);
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

	public function get_list_count($type='SELL')
	{
		$this->CI->db->where('shop_type', $type);
		$this->CI->db->where('shop_available',1);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('shop');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_shop_by_ID($id, $type='SELL')
	{
		$this->CI->db->where('shop_id', $id);
		$this->CI->db->where('shop_type', $type);
		$this->CI->db->where('shop_available',1);
		$this->CI->db->select('shop.*, users.*');
		$this->CI->db->from('shop');
		$this->CI->db->join('users', 'shop.user_id = users.users_id');
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

	public function get_shop_by_userID($id, $type='SELL')
	{
		$this->CI->db->where('user_id', $id);
		$this->CI->db->where('shop_type', $type);
		$query = $this->CI->db->get('shop');
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

	public function get_shop_by_two_ID($shop_id, $users_id)
	{
		$this->CI->db->where('shop_id', $shop_id);
		$this->CI->db->where('user_id', $users_id);
		//$this->CI->db->where('shop_type', $type);
		$query = $this->CI->db->get('shop');
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
	
	public function shop_update($id, $dataArray)
	{
		$this->CI->db->where('shop_id', $id);
		$this->CI->db->update('shop', $dataArray);
	}

	public function shop_add($dataArray)
	{
		$this->CI->db->insert('shop',$dataArray);
	}

	public function get_image($dataArray)
	{
		$this->CI->db->where($dataArray);
		$this->CI->db->select('shop_image_cover');
		$query = $this->CI->db->get('shop');
		$result = $query->row_array();
		return $result['shop_image_cover'];
	}

	public function shop_available($whereArray, $dataArray)
	{
		$this->CI->db->where($whereArray);
		$this->CI->db->update('shop', $dataArray);
	}
	public function get_products_list_by_keyword($keyword, $type = 'SELL')
	{
		$this->CI->db->where('shop_type', $type);
		$this->CI->db->where('shop_available',1);
		$this->CI->db->like('shop_title', $keyword);
		$this->CI->db->select('shop.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('shop');
		$this->CI->db->join('users', 'shop.user_id = users.users_id');
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
		$this->CI->db->where('shop_type', $type);
		$this->CI->db->where('shop_available',1);
		$this->CI->db->select('shop_id, shop_title, shop_price, shop_image_cover');
		$this->CI->db->order_by("shop_id", "desc"); 
		$this->CI->db->limit($count);
		$query = $this->CI->db->get('shop');
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
