<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Docslib{

	public $CI = NULL;

	public function __construct(){
		$this->CI =& get_instance();
	}

	public function getTitleList(){
		$this->CI->db->select('id, title');
		$this->CI->db->where('deleted', 0);
		$this->CI->db->order_by('sort', 'asc');
		$query = $this->CI->db->get('api_doc');

		if($query->num_rows() > 0){
			return $query->result();
		} else {
			return false;
		}
	}

	public function getContent($id){
		$this->CI->db->where('deleted', 0);
		$this->CI->db->where('id', $id);
		$query = $this->CI->db->get('api_doc');
		if($query->num_rows() > 0){
			return $query->row_array();
		} else {
			return false;
		}
	}
}
?>