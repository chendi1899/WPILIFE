<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sponsorlib
{

	public $CI = NULL;

	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_index()
	{
		//$this->CI->db->distinct('type');
		//$query = $this->CI->db->get('sponsor');
		$query =  $this->CI->db->query('SELECT distinct type FROM sponsor');
		if ($query->num_rows() > 0)
		{
			//var_dump($query->result());
			//die();
			$result = $query->result(); 
			$index = 0;
			foreach($result as $row)
			{
				$this->CI->db->select('id, name');
				$this->CI->db->where('enable', 1);
				$this->CI->db->where('type', $row->type);
				$sub_query = $this->CI->db->get('sponsor');
				if ($sub_query->num_rows() > 0)
				{
					$result[$index]->sub_list = $sub_query->result();
				}
				$index = $index + 1;
			}
			//print_r($result);
			return $result; 
		}		
		else
		{
			return false;
		}					   
		
	}

	public function get_name()
	{
		$query =  $this->CI->db->query('SELECT id, name FROM sponsor ORDER BY type');
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
	

	function get_content($id)
	{
		$this->CI->db->select('des');
		$this->CI->db->where('id', $id);
		$query = $this->CI->db->get('sponsor');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result['des']; 
		}		
		else
		{
			return false;
		}		
	}
	function get_content_by_name($index)
	{
		$this->CI->db->select('des');
		$this->CI->db->where('index', $index);
		$query = $this->CI->db->get('sponsor');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result['des']; 
		}		
		else
		{
			return false;
		}		
	}
	function sg_update($id, $dataArray)
	{
		$this->CI->db->where('id', $id);
		$this->CI->db->update('sponsor', $dataArray);
	}

	function get_country()
	{
		$this->CI->db->select('countries_name');
		$query = $this->CI->db->get('countries');
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
