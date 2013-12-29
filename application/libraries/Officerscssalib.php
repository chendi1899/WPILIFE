<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Officerscssalib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_officers($year = 0)
	{
		if($year == 0)
		{
			$year = get_lastest_years();
		}

		if($year)
		{

			$this->CI->db->select('title');
			$this->CI->db->order_by("sort_order", "asc"); 
			$query = $this->CI->db->get('cssa_officers_list');
			if ($query->num_rows() > 0)
			{
				$result = $query->result(); 
				return $result; 
			}	
		}	
		
		return false;
				   
		
	}
	
	public function get_distinct_years()
	{
		$this->DI->db->distinct();
		$this->CI->db->select('year');
		$this->CI->db->order_by("year", "desc"); 
		$query = $this->CI->db->get('cssa_officers_list');
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

	public function get_lastest_years()
	{
		$this->CI->db->select_max('year');
		$query = $this->CI->db->get('cssa_officers_list');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result['year']; 
		}		
		else
		{
			return false;
		}					   	
	}

	public function get_officer_list_with_content($from=0, $size=20)
	{
		$query = $this->CI->db->query("SELECT id, officers_title, officers_content, officers_year, officers_month, officers_day, 
											  users_firstname, users_lastname
									   FROM cssa_officers cb left join users on (cb.officers_author = users.users_id) 
									   ORDER BY id DESC 
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


	public function get_list_count()
	{
		return $this->CI->db->count_all('cssa_officers');
	}

	
	public function officer_update($id, $dataArray)
	{
		$this->CI->db->where('id', $id);
		$this->CI->db->update('cssa_officers', $dataArray);
	}

	public function officer_add($dataArray)
	{
		$this->CI->db->insert('cssa_officers',$dataArray);
	}

}
?>
