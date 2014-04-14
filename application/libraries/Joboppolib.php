<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Joboppolib{
	public $CI = NULL;
	public function __construct() {	
		$this->CI =& get_instance();
	}

	public function get_type_list() {
		$query = $this->CI->db->get('job_opportunity_type');
		if ($query->num_rows() > 0) {
			$result = $query->result(); 
			return $result; 
		} else {
			return false;
		}	
	}

	public function get_job_opportunity_list($enablePagination= false, $from=0, $size=20)
	{
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->order_by("job_opportunity.id", "desc"); 
		$this->CI->db->select('job_opportunity.*, job_opportunity_type.name');
		$this->CI->db->from('job_opportunity');
		$this->CI->db->join('job_opportunity_type', 'job_opportunity.type_id = job_opportunity_type.id');

		if($enablePagination == true) {
			$this->CI->db->limit($size, $from);
		}

		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			return $query->result(); 
		} else {
			return false;
		}					   
		
	}

	public function get_job_opportunity_list_by_type($enablePagination= false, $from=0, $size=20, $type) 
	{
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->where('type_id',$type);
		$this->CI->db->order_by("job_opportunity.id", "desc"); 
		$this->CI->db->select('job_opportunity.*, job_opportunity_type.*');
		$this->CI->db->from('job_opportunity');
		$this->CI->db->join('job_opportunity_type', 'job_opportunity.type_id = job_opportunity_type.id');

		if($enablePagination == true) {
			$this->CI->db->limit($size, $from);
		}

		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result(); 
			return $result;
		} else {
			return false;
		}					   
		
	}

	public function get_job_opportunity_count_by_type($type) {
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->where('type_id',$type);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('job_opportunity');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_type_name_by_id($type) {
		$this->CI->db->where('id',$type);
		$this->CI->db->select('name');
		$query = $this->CI->db->get('job_opportunity_type');
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['name'];
		} else {
			return false;
		}
		
	}

	public function get_job_name_by_id($id) {
		$this->CI->db->where('id',$id);
		$this->CI->db->select('title');
		$query = $this->CI->db->get('job_opportunity');
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['title'];
		} else {
			return false;
		}
		
	}

	public function get_job_opportunity_list_by_user($enablePagination= false, $from=0, $size=20, $user)
	{
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->where('poster',$user);
		$this->CI->db->order_by("job_opportunity.id", "desc"); 
		$this->CI->db->select('job_opportunity.*, job_opportunity_type.*');
		$this->CI->db->from('job_opportunity');
		$this->CI->db->join('job_opportunity_type', 'job_opportunity.job_opportunity_type_id = job_opportunity_type.id');
		if($enablePagination == true) {
			$this->CI->db->limit($size, $from);
		}

		$query = $this->CI->db->get();
		if ($query->num_rows() > 0) {
			$result = $query->result(); 
			return $result;
		} else {
			return false;
		}					   
		
	}

	public function get_job_opportunity_count_by_userID($user_id) {
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->where('poster',$user_id);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('job_opportunity');
		$result = $query->row_array();
		return $result['count'];
	}


	public function get_all_count() {
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->select('count(*) as count');
		$query = $this->CI->db->get('job_opportunity');
		$result = $query->row_array();
		return $result['count'];
	}

	public function get_job_opportunity_by_ID($id)
	{
		$this->CI->db->where('job_opportunity.id', $id);
		$this->CI->db->where('job_opportunity.isDeleted',0);
		$this->CI->db->select('job_opportunity.*, users.users_firstname, users.users_lastname, job_opportunity_type.*');
		$this->CI->db->from('job_opportunity');
		$this->CI->db->join('users', 'job_opportunity.poster = users.users_id');
		$this->CI->db->join('job_opportunity_type', 'job_opportunity.type_id = job_opportunity_type.id');
		$query = $this->CI->db->get();
		
		if ($query->num_rows() > 0) {
			$result = $query->row_array(); 
			return $result; 
		} else {
			return false;
		}					   
		
	}

	public function get_job_opportunity_by_two_ID($job_opportunity_id, $poster)
	{
		$this->CI->db->where('job_opportunity.id', $job_opportunity_id);
		$this->CI->db->where('poster', $poster);

		$query = $this->CI->db->get('job_opportunity');
		if ($query->num_rows() > 0) {
			$result = $query->row_array(); 
			return $result; 
		} else {
			return false;
		}	
	}
	
	public function update($id, $dataArray) {
		$this->CI->db->where('id', $id);
		$this->CI->db->update('job_opportunity', $dataArray);
	}

	public function add($dataArray) {
		$this->CI->db->insert('job_opportunity',$dataArray);
	}


}
?>