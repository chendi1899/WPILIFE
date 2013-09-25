<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activitycssalib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_activity_list()
	{
		$this->CI->db->select('activities_id, activities_title');
		$this->CI->db->order_by("activities_id", "desc"); 
		$query = $this->CI->db->get('cssa_activities');
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

	public function get_activity_list_by_keyword($keyword)
	{
		$keyword = $this->CI->security->xss_clean($keyword);
		$query = $this->CI->db->query("SELECT activities_id, activities_title, activities_content, activities_year, activities_month, activities_day, 
											  users_firstname, users_lastname
									   FROM cssa_activities ca left join users on (ca.activities_author = users.users_id) 
									   WHERE activities_title like '%".$keyword."%'
									   ORDER BY activities_id DESC ");
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

	public function get_activity_list_with_content($from=0, $size=20)
	{
		$query = $this->CI->db->query("SELECT activities_id, activities_title, activities_content, activities_year, activities_month, activities_day, 
											  users_firstname, users_lastname
									   FROM cssa_activities ca left join users on (ca.activities_author = users.users_id) 
									   ORDER BY activities_id DESC 
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

	public function get_activity_list_by_count($count=2)
	{
		$query = $this->CI->db->query("SELECT activities_id, activities_title, activities_content, activities_month, activities_day 
									   FROM cssa_activities 
									   ORDER BY activities_id DESC 
									   limit 0,".$count);
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
		return $this->CI->db->count_all('cssa_activities');
	}

	public function get_activity_by_ID($id)
	{
		$this->CI->db->where('activities_id', $id);
		$this->CI->db->select('activities_id, activities_title, activities_content, activities_year, activities_month, activities_day, users_firstname, users_lastname');
		$this->CI->db->from('cssa_activities');
		$this->CI->db->join('users', 'cssa_activities.activities_author = users.users_id');
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
	
	public function activity_update($id, $dataArray)
	{
		$this->CI->db->where('activities_id', $id);
		$this->CI->db->update('cssa_activities', $dataArray);
	}

	public function activity_add($dataArray)
	{
		$this->CI->db->insert('cssa_activities',$dataArray);
	}

	public function get_archive_list()
	{
		$query = $this->CI->db->query("SELECT DISTINCT activities_year, activities_month 
									   FROM cssa_activities 
									   ORDER BY activities_id DESC ");
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

	public function get_activity_list_by_year_with_month($year=0, $month='')
	{
		$year = $this->CI->security->xss_clean($year);
		$month = $this->CI->security->xss_clean($month);
		$query = $this->CI->db->query("SELECT activities_id, activities_title, activities_content, activities_year, activities_month, activities_day, 
											  users_firstname, users_lastname
									   FROM cssa_activities ca left join users on (ca.activities_author = users.users_id) 
									   WHERE activities_year = ".$year." AND activities_month = '".$month."' 
									   ORDER BY activities_id DESC ");
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
