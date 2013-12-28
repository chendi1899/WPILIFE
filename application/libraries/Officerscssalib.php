<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Officerscssalib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_blog_list()
	{
		$this->CI->db->select('blogs_id, blogs_title');
		$this->CI->db->order_by("blogs_id", "desc"); 
		$query = $this->CI->db->get('cssa_blogs');
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

	public function get_blog_list_by_keyword($keyword)
	{
		$keyword = $this->CI->security->xss_clean($keyword);
		$query = $this->CI->db->query("SELECT blogs_id, blogs_title, blogs_content, blogs_year, blogs_month, blogs_day, 
											  users_firstname, users_lastname
									   FROM cssa_blogs ca left join users on (ca.blogs_author = users.users_id) 
									   WHERE blogs_title like '%".$keyword."%'
									   ORDER BY blogs_id DESC ");
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
	
	public function get_blog_list_with_content($from=0, $size=20)
	{
		$query = $this->CI->db->query("SELECT blogs_id, blogs_title, blogs_content, blogs_year, blogs_month, blogs_day, 
											  users_firstname, users_lastname
									   FROM cssa_blogs cb left join users on (cb.blogs_author = users.users_id) 
									   ORDER BY blogs_id DESC 
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

	public function get_blog_list_by_count($count=2)
	{
		$query = $this->CI->db->query("SELECT blogs_id, blogs_title, blogs_content, blogs_month, blogs_day
									   FROM cssa_blogs 
									   ORDER BY blogs_id DESC 
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

	public function get_list_count()
	{
		return $this->CI->db->count_all('cssa_blogs');
	}

	public function get_blog_by_ID($id)
	{
		$this->CI->db->where('blogs_id', $id);
		$this->CI->db->select('blogs_id, blogs_title, blogs_content, blogs_year, blogs_month, blogs_day, users_firstname, users_lastname');
		$this->CI->db->from('cssa_blogs');
		$this->CI->db->join('users', 'cssa_blogs.blogs_author = users.users_id');
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
	
	public function blog_update($id, $dataArray)
	{
		$this->CI->db->where('blogs_id', $id);
		$this->CI->db->update('cssa_blogs', $dataArray);
	}

	public function blog_add($dataArray)
	{
		$this->CI->db->insert('cssa_blogs',$dataArray);
	}

	public function get_archive_list()
	{
		$query = $this->CI->db->query("SELECT DISTINCT blogs_year, blogs_month 
									   FROM cssa_blogs 
									   ORDER BY blogs_id DESC ");
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

	public function get_blog_list_by_year_with_month($year=0, $month='')
	{
		$year = $this->CI->security->xss_clean($year);
		$month = $this->CI->security->xss_clean($month);
		$query = $this->CI->db->query("SELECT blogs_id, blogs_title, blogs_content, blogs_year, blogs_month, blogs_day, 
											  users_firstname, users_lastname
									   FROM cssa_blogs ca left join users on (ca.blogs_author = users.users_id) 
									   WHERE blogs_year = ".$year." AND blogs_month = '".$month."' 
									   ORDER BY blogs_id DESC ");
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
