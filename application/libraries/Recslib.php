<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Recslib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_type_list()
	{
		$query = $this->CI->db->get('recs_type');
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

	public function get_recs_list($enablePagination= false, $from=0, $size=20)
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->order_by("recs_id", "desc"); 
		$this->CI->db->select('recs.*, recs_type.*');
		$this->CI->db->from('recs');
		$this->CI->db->join('recs_type', 'recs.recs_type_id = recs_type.id');
		if($enablePagination == true)
		{
			$this->CI->db->limit($size, $from);
		}
		$query = $this->CI->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->result(); 
		}		
		else
		{
			return false;
		}					   
		
	}

	public function get_recs_list_by_type($enablePagination= false, $from=0, $size=20, $type)
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->where('recs_type_id',$type);
		$this->CI->db->order_by("recs_id", "desc"); 
		$this->CI->db->select('recs.*, recs_type.*');
		$this->CI->db->from('recs');
		$this->CI->db->join('recs_type', 'recs.recs_type_id = recs_type.id');
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

	public function get_recs_count_by_type($type)
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->where('recs_type_id',$type);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('recs');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_type_name_by_id($type)
	{
		$this->CI->db->where('id',$type);
		$this->CI->db->select('name');
		$query = $this->CI->db->get('recs_type');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result['name'];
		}		
		else
		{
			return false;
		}
		
	}

	public function get_recs_list_by_user($enablePagination= false, $from=0, $size=20, $user)
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->where('user_id',$user);
		$this->CI->db->order_by("recs_id", "desc"); 
		$this->CI->db->select('recs.*, recs_type.*');
		$this->CI->db->from('recs');
		$this->CI->db->join('recs_type', 'recs.recs_type_id = recs_type.id');
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

	public function get_recs_count_by_user($user)
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->where('user_id',$user);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('recs');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_user_name_by_id($user)
	{
		$this->CI->db->where('users_id',$user);
		$this->CI->db->select('users_firstname');
		$query = $this->CI->db->get('users');
		
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array();
			return $result['users_firstname'];
		}		
		else
		{
			return false;
		}
		
	}

	

	public function get_all_count()
	{
		$this->CI->db->where('recs_available',1);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('recs');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_recs_by_ID($id)
	{
		$this->CI->db->where('recs_id', $id);
		$this->CI->db->where('recs_available',1);
		$this->CI->db->select('recs.*, users.users_firstname, users.users_lastname, recs_type.*');
		$this->CI->db->from('recs');
		$this->CI->db->join('users', 'recs.user_id = users.users_id');
		$this->CI->db->join('recs_type', 'recs.recs_type_id = recs_type.id');
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

	public function get_recs_by_two_ID($recs_id, $users_id)
	{
		$this->CI->db->where('recs_id', $recs_id);
		$this->CI->db->where('user_id', $users_id);
		//$this->CI->db->where('recs_type', $type);
		$query = $this->CI->db->get('recs');
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
	
	public function recs_update($id, $dataArray)
	{
		$this->CI->db->where('recs_id', $id);
		$this->CI->db->update('recs', $dataArray);
	}

	public function recs_add($dataArray)
	{
		$this->CI->db->insert('recs',$dataArray);
	}

	public function recs_available($whereArray, $dataArray)
	{
		$this->CI->db->where($whereArray);
		$this->CI->db->update('recs', $dataArray);
	}

	public function get_item_list_by_keyword($keyword, $type = 'SELL')
	{
		$this->CI->db->where('recs_type', $type);
		$this->CI->db->where('recs_available',1);
		$this->CI->db->like('recs_title', $keyword);
		$this->CI->db->select('recs.*, users.users_firstname, users.users_lastname');
		$this->CI->db->from('recs');
		$this->CI->db->join('users', 'recs.user_id = users.users_id');
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
	
}
?>
