<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Searchlib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_list_by_keyword($keyword)
	{
		$keyword = $this->CI->security->xss_clean($keyword);
		$query = $this->CI->db->query("(SELECT blogs_id as id, blogs_title as title, blogs_content as content, blogs_year as year, 
											   blogs_month as month, blogs_day as day, type, 
											   users_firstname, users_lastname
									   FROM cssa_blogs ca left join users on (ca.blogs_author = users.users_id) 
									   WHERE blogs_title like '%".$keyword."%'
									   ORDER BY blogs_id DESC) 
									   UNION 
									   (SELECT activities_id as id, activities_title as title, activities_content as content, activities_year as year, 
											   activities_month as month, activities_day as day, type, 
											   users_firstname, users_lastname
									   FROM cssa_activities ca left join users on (ca.activities_author = users.users_id) 
									   WHERE activities_title like '%".$keyword."%'
									   ORDER BY activities_id DESC
									   )
									   ");
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
