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

			$this->CI->db->select('title, director');
			$this->CI->db->where('year', $year);
			$this->CI->db->where('director !=', "");
			$this->CI->db->order_by("sort_order", "asc"); 
			$query = $this->CI->db->get('cssa_officers_list');
			if ($query->num_rows() > 0)
			{
				$result = $query->result(); 
				foreach($result as $row)
				{
					$directors = array();
					$directors_id = explode(",", $row->director);
					foreach($directors_id as $id)
					{
						$this->CI->db->select('id,name,photo,major,email,des');
						$this->CI->db->where('id', $id);
						$sub_query = $this->CI->db->get('cssa_officers_info');
						if ($sub_query->num_rows() > 0)
						{
							array_push($directors, $sub_query->result());
						}
					}
					$row->directors = $directors;
					unset($directors);
				}
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
}
?>
