<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Bonuslib
{

	public $CI = NULL;
	public function __construct()
	{	
		$this->CI =& get_instance();
	}

	public function getLover($hashCode)
	{
		$this->CI->db->where('hashCode', $hashCode);
		$query = $this->CI->db->get('love');
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}		
		else
		{
			return false;
		}					   
		
	}

	
	public function loverAdd($dataArray)
	{
		$this->CI->db->insert('love',$dataArray);
	}


}
?>
