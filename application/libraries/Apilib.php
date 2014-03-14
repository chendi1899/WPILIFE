<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Apilib{

	public $CI = NULL;

	public function __construct(){
		$this->CI =& get_instance();
	}

	public function getSellInfoByID($id){
		if(is_numeric($id)){
			$this->CI->db->where('shop_type', 'SELL');
			$this->CI->db->where('shop_id', $id);
			$this->CI->db->select('shop.*, users.users_firstname, users.users_lastname, users.users_email_address,
								   users.users_telephone, users.users_qq');
			$this->CI->db->from('shop');
			$this->CI->db->join('users', 'shop.user_id = users.users_id');
			$query = $this->CI->db->get();
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				$result[0]['shop_image_cover'] = base_url().'images/shop/'.$result[0]['shop_image_cover'];
				$result[0]['shop_content'] = str_replace('/kindeditor', base_url().'kindeditor', $result[0]['shop_content']);
				return $result; 
			}	
		}	
		return false;
	}
	public function getUserInfoByID($id){
		if(is_numeric($id)){
			$this->CI->db->where('users_id', $id);
			$this->CI->db->select('users_firstname as first_name, users_lastname as last_name, users_email_address as email, users_qq as qq');
			$query = $this->CI->db->get('users');
			if ($query->num_rows() > 0){
				$result = $query->result_array(); 
				return $result; 
			}	
		}	
		return false;
	}
}
?>