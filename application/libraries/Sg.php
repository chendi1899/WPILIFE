<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sg
{

	public $CI = NULL;


	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function get_index()
	{
		$this->CI->db->select('id, index, parent_id');
		$this->CI->db->where('parent_id', 0);
		$query = $this->CI->db->get('suvival_guide');
		if ($query->num_rows() > 0)
		{
			$result = $query->result(); 
			$index = 0;
			foreach($result as $row)
			{
				$this->CI->db->select('id, index, parent_id');
				$this->CI->db->where('parent_id', $row->id);
				$sub_query = $this->CI->db->get('suvival_guide');
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

	public function get_root_index()
	{
		$this->CI->db->select('id, index');
		$this->CI->db->where('parent_id', 0);
		$query = $this->CI->db->get('suvival_guide');
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
		$this->CI->db->select('content');
		$this->CI->db->where('id', $id);
		$query = $this->CI->db->get('suvival_guide');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result['content']; 
		}		
		else
		{
			return false;
		}		
	}
	function get_content_by_name($index)
	{
		$this->CI->db->select('content');
		$this->CI->db->where('index', $index);
		$query = $this->CI->db->get('suvival_guide');
		if ($query->num_rows() > 0)
		{
			$result = $query->row_array(); 
			return $result['content']; 
		}		
		else
		{
			return false;
		}		
	}
	function sg_update($id, $dataArray)
	{
		$this->CI->db->where('id', $id);
		$this->CI->db->update('suvival_guide', $dataArray);
	}

}

?>
