<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Changeloglib
{

	public $CI = NULL;
	public function __construct(){	
		$this->CI =& get_instance();
	}

	public function getAll(){
		$query = $this->CI->db->get('changelog');
		if ($query->num_rows() > 0)	{
			$result = $query->result(); 
			return $result; 
		} else {
			return false;
		}	
	}
	
}
?>
