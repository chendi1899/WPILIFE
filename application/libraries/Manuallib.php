<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manuallib
{

	public $CI = NULL;
	public function __construct(){	
		$this->CI =& get_instance();
	}


	function getTitleList(){
		$this->CI->db->select('id, title');
		$this->CI->db->where('deleted', 0);
		$this->CI->db->order_by("sort", "asc");
		$query = $this->CI->db->get('manual');
		if ($query->num_rows() > 0)	{
			$result = $query->result(); 
			return $result; 
		} else {
			return false;
		}	
	}
	
	function getContent($id){
		$this->CI->db->where('id',$id);
		$this->CI->db->where('deleted', 0);
		$query = $this->CI->db->get('manual');
		if ($query->num_rows() > 0)	{
			return $query->row_array();
		} else {
			return false;
		}
	}

	function contentUpdate($id, $dataArray){
		$this->CI->db->where('id', $id);
		$this->CI->db->update('manual', $dataArray);
		return $this->CI->db->affected_rows();
	}
}
?>
